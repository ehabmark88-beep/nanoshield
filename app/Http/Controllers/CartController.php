<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $carts = Cart::with('products')->get();
        return view('admin.carts.index', compact('carts'));
    }

    /**
     * عرض نموذج إنشاء كارت جديد.
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.carts.create', compact('products'));
    }

    /**
     * تخزين كارت جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $cart = Cart::create([
            'user_id' => $request->user_id,
        ]);

        if ($request->has('products')) {
            foreach ($request->products as $productId => $quantity) {
                $cart->products()->attach($productId, ['quantity' => $quantity]);
            }
        }

        return redirect()->route('admin.dashboard.carts.index')->with('success', 'تم إنشاء الكارت بنجاح!');
    }

    /**
     * عرض نموذج تعديل كارت موجود.
     */
    public function edit($id)
    {
        $cart = Cart::with('products')->findOrFail($id);
        $products = Product::all();
        return view('admin.carts.edit', compact('cart', 'products'));
    }

    /**
     * تحديث كارت في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        // تحديث بيانات الكارت (مثلاً المستخدم المرتبط بالكارت)
        $cart->update([
            'user_id' => $request->user_id,
        ]);

        // تحديث المنتجات المرتبطة بالكارت
        $cart->products()->detach();
        if ($request->has('products')) {
            foreach ($request->products as $productId => $quantity) {
                $cart->products()->attach($productId, ['quantity' => $quantity]);
            }
        }

        return redirect()->route('admin.dashboard.carts.index')->with('success', 'تم تعديل الكارت بنجاح!');
    }

    /**
     * حذف كارت من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $cart = Cart::findOrFail($id);
        $cart->products()->detach(); // إزالة جميع العلاقات مع المنتجات
        $cart->delete();

        return back()->with('success', 'تم حذف الكارت بنجاح!');
    }
}
