<?php

namespace App\Http\Controllers;

use App\Models\Governorate;
use Illuminate\Http\Request;

class GovernorateController extends Controller
{
    public function index()
    {
        $governorates = Governorate::all();
        return view('admin.governorates.index', compact('governorates'));
    }

    /**
     * عرض نموذج إضافة محافظة جديدة.
     */
    public function create()
    {
        return view('admin.governorates.create');
    }

    /**
     * تخزين محافظة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255', // تحقق من أن الاسم مطلوب
        ]);

        Governorate::create($request->all()); // إنشاء محافظة جديدة

        return redirect()->route('admin.dashboard.governorates.index')->with('success', 'تمت إضافة المحافظة بنجاح');
    }

    /**
     * عرض نموذج تعديل محافظة.
     */
    public function edit(Governorate $governorate)
    {
        return view('admin.governorates.edit', compact('governorate'));
    }

    /**
     * تحديث بيانات المحافظة.
     */
    public function update(Request $request, Governorate $governorate)
    {
        $request->validate([
            'name' => 'required|string|max:255', // تحقق من أن الاسم مطلوب
        ]);

        $governorate->update($request->all()); // تحديث المحافظة

        return redirect()->route('admin.dashboard.governorates.index')->with('success', 'تم تعديل المحافظة بنجاح');
    }

    /**
     * حذف المحافظة.
     */
    public function destroy(Governorate $governorate)
    {
        $governorate->delete(); // حذف المحافظة
        return redirect()->route('admin.dashboard.governorates.index')->with('success', 'تم حذف المحافظة بنجاح');
    }
}
