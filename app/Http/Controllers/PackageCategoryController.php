<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Package_category;
use Illuminate\Http\Request;

class PackageCategoryController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $categories = Package_category::all();
        return view('admin.package_categories.index', compact('categories'));
    }

    /**
     * عرض نموذج إنشاء تصنيف جديد.
     */
    public function create()
    {
        return view('admin.package_categories.create');
    }

    /**
     * تخزين تصنيف جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        Package_category::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'details' => $request->details,
            'image' => $request->hasFile('image') ? $this->saveImage($request->file('image'), 'img/package_categories') : null,
        ]);

        return redirect()->route('admin.dashboard.package_category.index')->with('success', 'تم إضافة التصنيف بنجاح!');
    }

    /**
     * عرض نموذج تعديل تصنيف موجود.
     */
    public function edit($id)
    {
        $category = Package_category::findOrFail($id);
        return view('admin.package_categories.edit', compact('category'));
    }

    /**
     * تحديث تصنيف في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $category = Package_category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'details' => $request->details,
        ]);

        if ($request->hasFile('image')) {
            $img = $this->saveImage($request->file('image'), 'img/package_categories');
            $category->update(['image' => $img]);
        } elseif ($request->has('old_image')) {
            $category->update(['image' => $request->old_image]);
        }

        return redirect()->route('admin.dashboard.package_category.index')->with('success', 'تم تعديل التصنيف بنجاح!');
    }

    /**
     * حذف تصنيف من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $category = Package_category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'تم حذف التصنيف بنجاح!');
    }
}
