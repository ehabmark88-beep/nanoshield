<?php

namespace App\Livewire;

use App\Models\Cart as cart;
use App\Models\Coupon;
use Livewire\Component;
use Illuminate\Support\Facades\DB;


class Shoppingcart extends Component
{
    public $carts, $sub_total = 0, $total = 0, $tax = 10;
    public $couponCode; // To hold the coupon code input
    public $discount = 0; // To hold the discount amount from the coupon
    public $discounted_total = 0; // To hold the total after discount
    public $isPercentage = false; // To determine if the discount is a percentage
    
    public $availablePoints = 0;
public $usePoints = false;
public $pointsToUse = 0;
public $pointsDiscount = 0;


    public $couponId; // متغير لتخزين id الكوبون


    public function render()
    {
        // تحقق من مصادقة المستخدم
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->carts = Cart::with('product')
            ->where(['user_id' => auth()->user()->id])
            ->get();

        $this->total = 0;
        $this->sub_total = 0;
        
        $this->availablePoints = DB::table('loyalty_points_ledger')
    ->where('email', auth()->user()->email)
    ->where('status', 'active')
    ->where(function ($q) {
        $q->whereNull('expires_at')
          ->orWhere('expires_at', '>', now());
    })
    ->sum('points');


        $this->tax = 0;

        foreach ($this->carts as $item) {
            $this->sub_total += $item->product->price * $item->quantity;
        }

        // حساب السعر بعد الخصم
        $this->calculateDiscountedTotal();
        $this->total = $this->discounted_total + $this->tax; // يجب تحديث total ليشمل السعر بعد الخصم

        return view('livewire.shoppingcart');
    }

    public function increment($id)
    {
        $cartQ = Cart::whereId($id)->first();
        $cartQ->quantity += 1;
        $cartQ->save();
        session()->flash('success', 'تم تعديل الكمية');

    }

    public function decrement($id)
    {
        $cartQ = Cart::whereId($id)->first();
        if($cartQ->quantity > 1) {
            $cartQ->quantity -= 1;
            $cartQ->save();
            session()->flash('success', 'تم تعديل الكمية');
        } else {
            session()->flash('info', 'لا يمكن أن تكون الكمية أقل من 1');
        }
    }

   public function remove($id)
    {
        $cartRemove = Cart::whereId($id)->first();

        if ($cartRemove) {
            $productId = $cartRemove->product_id;
            $cartRemove->delete();

            // تحديث الجلسة لإزالة المنتج من addedProducts
            $addedProducts = session('addedProducts', []);
            if (($key = array_search($productId, $addedProducts)) !== false) {
                unset($addedProducts[$key]);
                session()->put('addedProducts', $addedProducts);

                // تحديث عداد السلة
                session()->put('cart_count', count($addedProducts));
            }

            session()->flash('success', 'تم حذف المنتج من السلة');
        }

        // إعادة تحميل الصفحة
        return redirect()->to(request()->header('Referer'));
    }

    // دالة لتطبيق القسيمة
    public function applyCoupon()
    {
        $coupon = Coupon::where('code', $this->couponCode)->first();

        if (!$coupon) {
            session()->flash('error', 'كود القسيمة غير صالح.');
            return;
        }

        // Check if the coupon is expired
        if ($coupon->expiry_date && now()->greaterThan($coupon->expiry_date)) {
            session()->flash('error', 'انتهت صلاحية هذه القسيمة.');
            return;
        }

        // Check usage limit
        if ($coupon->usage_limit && $coupon->used >= $coupon->usage_limit) {
            session()->flash('error', 'وصلت القسيمة إلى حد استخدامها.');
            return;
        }

        // Reset the discount
        $this->discount = 0;
        $this->isPercentage = false; // Reset the percentage flag

        // Calculate discount
        if ($coupon->type === 'fixed') {
            $this->discount = $coupon->discount; // مبلغ ثابت
        } else { // 'percent'
            $this->discount = $coupon->discount; // نسبة مئويةF
            $this->isPercentage = true; // تحديد أن الخصم هو نسبة مئوية
        }

        // Increment usage count
        $coupon->increment('used');

        $this->couponId = $coupon->id; // حفظ id الكوبون

        session()->flash('success', 'تم تطبيق القسيمة بنجاح!');

        // إعادة حساب السعر بعد الخصم
        $this->calculateDiscountedTotal();
    }

    // دالة جديدة لحساب السعر بعد الخصم
protected function calculateDiscountedTotal()
{
    $discounted_total = $this->sub_total;

    // خصم الكوبون
    if ($this->discount > 0) {
        if ($this->isPercentage) {
            $discounted_total -= ($this->sub_total * $this->discount) / 100;
        } else {
            $discounted_total -= $this->discount;
        }
    }

    // خصم نقاط الولاء
    if ($this->usePoints && $this->pointsDiscount > 0) {
        $discounted_total -= $this->pointsDiscount;
    }

    $this->discounted_total = max(0, $discounted_total);
}

    
public function applyLoyaltyPoints()
{
    // منع التكرار
    if ($this->usePoints) {
        return;
    }

    // حساب الرصيد الحقيقي من DB
    $availablePoints = \DB::table('loyalty_points_ledger')
        ->where('email', auth()->user()->email)
        ->where('status', 'active')
        ->where(function ($q) {
            $q->whereNull('expires_at')
              ->orWhere('expires_at', '>', now());
        })
        ->sum('points');

    if ($availablePoints < 1000) {
        session()->flash('error', 'لا يمكن استخدام أقل من 1000 نقطة');
        return;
    }

    $pointsToUse = floor($availablePoints / 1000) * 1000;
    $remaining = $pointsToUse;

    \DB::beginTransaction();

    try {

        // FIFO خصم فعلي
        $rows = \DB::table('loyalty_points_ledger')
            ->where('email', auth()->user()->email)
            ->where('status', 'active')
            ->where(function ($q) {
                $q->whereNull('expires_at')
                  ->orWhere('expires_at', '>', now());
            })
            ->orderBy('created_at')
            ->lockForUpdate()
            ->get();

        foreach ($rows as $row) {
            if ($remaining <= 0) break;

            if ($row->points <= $remaining) {
                \DB::table('loyalty_points_ledger')
                    ->where('id', $row->id)
                    ->update([
                        'points' => 0,
                        'status' => 'consumed',
                        'consumed_at' => now(),
                        'note' => trim(($row->note ?? '') . ' | خصم مباشر من السلة')
                    ]);

                $remaining -= $row->points;
            } else {
                \DB::table('loyalty_points_ledger')
                    ->where('id', $row->id)
                    ->update([
                        'points' => $row->points - $remaining,
                        'note' => trim(($row->note ?? '') . ' | خصم جزئي من السلة')
                    ]);

                $remaining = 0;
            }
        }

        \DB::commit();

        // حساب الخصم
        $this->pointsToUse   = $pointsToUse;
        $this->pointsDiscount = ($pointsToUse / 1000) * 100;
        $this->usePoints     = true;

        // إعادة حساب السعر
        $this->calculateDiscountedTotal();

        session()->flash('success', 'تم خصم نقاط الولاء');

    } catch (\Throwable $e) {
        \DB::rollBack();
        session()->flash('error', 'فشل خصم النقاط');
    }
}


}
