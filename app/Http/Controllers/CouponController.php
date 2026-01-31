<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::all();
        return view('admin.coupons.index', compact('coupons'));
    }

    /**
     * عرض نموذج إنشاء كوبون جديد.
     */
    public function create()
    {
        return view('admin.coupons.create');
    }

    /**
     * تخزين كوبون جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        Coupon::create([
            'code' => $request->code,
            'type' => $request->type,
            'discount' => $request->discount,
            'expiry_date' => $request->expiry_date,
            'description' => $request->description,
            'usage_limit'=> $request->usage_limit
        ]);

        return redirect()->route('admin.dashboard.coupons.index')->with('success', 'تم إنشاء الكوبون بنجاح!');
    }

    /**
     * عرض نموذج تعديل كوبون موجود.
     */
    public function edit($id)
    {
        $coupon = Coupon::findOrFail($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

    /**
     * تحديث كوبون في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $coupon = Coupon::findOrFail($id);

        $coupon->update([
            'code' => $request->code,
            'discount' => $request->discount,
            'type' => $request->type,
            'expiry_date' => $request->expiry_date,
            'description' => $request->description,
            'usage_limit'=> $request->usage_limit
        ]);

        return redirect()->route('admin.dashboard.coupons.index')->with('success', 'تم تعديل الكوبون بنجاح!');
    }

    /**
     * حذف كوبون من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        return back()->with('success', 'تم حذف الكوبون بنجاح!');
    }
}
