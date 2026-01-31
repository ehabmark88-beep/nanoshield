<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Product_category;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $categories = Product_category::all();
        return view('admin.product_categories.index', compact('categories'));
    }

    /**
     * عرض نموذج إنشاء تصنيف جديد.
     */
    public function create()
    {
        return view('admin.product_categories.create');
    }

    /**
     * تخزين تصنيف جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $img = $request->hasFile('image') ? $this->saveImage($request->file('image'), 'img/product_categories') : null;

        Product_category::create([
            'name' => $request->name,
            'description' => $request->description,
            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.product_category.index')->with('success', 'تم إضافة التصنيف بنجاح!');
    }

    /**
     * عرض نموذج تعديل تصنيف موجود.
     */
    public function edit($id)
    {
        $category = Product_category::findOrFail($id);
        return view('admin.product_categories.edit', compact('category'));
    }

    /**
     * تحديث تصنيف في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $category = Product_category::findOrFail($id);

        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        if ($request->hasFile('image')) {
            $img = $this->saveImage($request->file('image'), 'img/product_categories');
            $category->update(['image' => $img]);
        } elseif ($request->has('old_image')) {
            $category->update(['image' => $request->old_image]);
        }

        return redirect()->route('admin.dashboard.product_category.index')->with('success', 'تم تعديل التصنيف بنجاح!');
    }

    /**
     * حذف تصنيف من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $category = Product_category::findOrFail($id);
        $category->delete();

        return back()->with('success', 'تم حذف التصنيف بنجاح!');
    }
}
