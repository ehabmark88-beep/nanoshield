<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // عرض الطلبات
    public function index()
    {
        $orders = Order::latest()->get(); // استرجاع الطلبات بترتيب الأحدث

        // فك حقل product_ids وجلب أسماء المنتجات
        foreach ($orders as $order) {
            $products = json_decode($order->product_ids, true); // فك JSON للمنتجات
            $productNames = [];

            if (is_array($products)) {
                foreach ($products as $product) {
                    $productName = Product::find($product['product_id'])->name_ar ?? 'منتج غير موجود'; // جلب اسم المنتج
                    $productNames[] = [
                        'name' => $productName,
                        'quantity' => $product['quantity']
                    ];
                }
            }

            // إضافة أسماء المنتجات مع الكميات لكل طلب
            $order->product_names = $productNames;
        }

        return view('admin.orders.index', compact('orders'));
    }

    // عرض تفاصيل طلب معين
    public function show($id)
    {
        $order = Order::findOrFail($id); // استرجاع الطلب حسب ID
        return view('admin.orders.show', compact('order'));
    }

    public function edit($id)
    {
        $order = Order::findOrFail($id); // جلب الطلب حسب الـ ID
        return view('admin.orders.edit', compact('order'));
    }


   // تحديث حالة الطلب
public function update(Request $request, $id)
{
    $order = Order::findOrFail($id);

    // ✅ Validation
    $validated = $request->validate([
        'name'           => 'required|string|max:255',
        'email'          => 'required|email|max:255',
        'phone_number'   => 'required|string|max:50',
        'status'         => 'required|in:pending,in_progress,completed,cancelled',
        'payment_method' => 'required|in:payBranch,online',
    ]);

    // ✅ تحديث البيانات
    $order->update([
        'name'           => $validated['name'],
        'email'          => $validated['email'],
        'phone_number'   => $validated['phone_number'],
        'status'         => $validated['status'],
        'payment_method' => $validated['payment_method'],
    ]);

    // ✅ رجوع مع رسالة نجاح
    return redirect()
        ->route('admin.dashboard.orders.index')
        ->with('success', 'تم تحديث الطلب بنجاح');
}

}
