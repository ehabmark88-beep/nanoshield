<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Gallery;
use App\Models\Package;
use App\Models\Package_category; // تعديل الاسم ليتبع قواعد Laravel
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    use ImageTrait;

    /**
     * عرض جميع العناصر في معرض الصور.
     */
    public function index()
    {
        $galleries = Gallery::get();
        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * عرض نموذج إنشاء عنصر جديد في المعرض.
     */
    public function create()
    {
        $packages = Package::all();
        $categories = Package_category::all(); // تعديل الاسم
        return view('admin.galleries.create', compact('packages', 'categories'));
    }

    /**
     * تخزين عنصر جديد في المعرض في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // حفظ الصورة باستخدام الـ trait
        $image = $this->saveImage($request->image, 'img/gallery');

        // إنشاء العنصر الجديد في المعرض
        Gallery::create([
            'image' => $image,
            'details' => $request->details,
        ]);

        return redirect()->route('admin.dashboard.galleries.index')->with('success', 'تم إضافة العنصر بنجاح!');
    }

    /**
     * عرض نموذج تعديل عنصر موجود في المعرض.
     */
    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);
        $packages = Package::all();
        $categories = Package_category::all(); // تعديل الاسم
        return view('admin.galleries.edit', compact('gallery', 'packages', 'categories'));
    }

    /**
     * تحديث عنصر في المعرض في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        // تحديث بيانات العنصر
        $gallery->update([
            'details' => $request->details,
        ]);

        // التعامل مع تحديث الصورة
        if (!isset($request->image)) {
            $gallery->update([
                'image' => $request->old_image
            ]);
        } else {
            $image = $this->saveImage($request->image, 'img/gallery');
            $gallery->update([
                'image' => $image
            ]);
        }

        return redirect()->route('admin.dashboard.galleries.index')->with('success', 'تم تعديل العنصر بنجاح!');
    }

    /**
     * حذف عنصر من المعرض من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);
        $gallery->delete();

        return back()->with('success', 'تم حذف العنصر بنجاح!');
    }
}
