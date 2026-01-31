<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Product;

class Productlist extends Component
{
    public $products; // قائمة المنتجات
    public $addedProducts = []; // المنتجات التي تمت إضافتها

    public function mount()
    {
        // لا نحتاج إلى updateCartCount هنا، سيتم التحكم بالعداد من خلال الملاحظة المباشرة
    }

    public function render()
    {
        $this->products = Product::orderByRaw('price = 0')->get();
        return view('livewire.productlist');
    }

    public function addToCart($id)
    {
        if (auth()->user()) {
            $data = [
                'user_id' => auth()->user()->id,
                'product_id' => $id,
            ];

            Cart::updateOrCreate($data);  // التأكد من تحديث السلة

            // تحديث عداد السلة باستخدام الجلسة
            $addedProducts = session('addedProducts', []);
            $addedProducts[] = $id;
            session()->put('addedProducts', $addedProducts);

            // عداد السلة يتم تحديثه هنا من الجلسة
            session()->put('cart_count', count($addedProducts));

            session()->flash('success', 'تم إضافة المنتج إلى السلة');
            return redirect()->to(request()->header('Referer'));
        } else {
            return redirect(route('login'));
        }
    }
}
