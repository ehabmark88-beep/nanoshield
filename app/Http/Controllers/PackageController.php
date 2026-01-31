<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Package_category;
use App\Models\Car; // موديل السيارة
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    use ImageTrait;

    /**
     * عرض قائمة الباقات.
     */
    public function index()
    {
        $packages = Package::with('car')->get();
        return view('admin.packages.index', compact('packages'));
    }

    /**
     * عرض نموذج إنشاء باقة جديدة.
     */
    public function create()
    {
        $categories = Package_category::all();
        $cars = Car::all();
        return view('admin.packages.create', compact('categories', 'cars'));
    }

    /**
     * تخزين باقة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
//        $img = $this->saveImage($request->file('image'), 'img/packages');

        Package::create([
            'name' => $request->name,
            'name_en' => $request->name_en,

            'price' => $request->price,
            'price_before_discount' => $request->price_before_discount,
            'hours' => $request->hours,
            'feature_1' => $request->feature_1,
            'feature_1_en' => $request->feature_1_en,

            'feature_2' => $request->feature_2,
            'feature_2_en' => $request->feature_2_en,

            'feature_3' => $request->feature_3,
            'feature_3_en' => $request->feature_3_en,

            'feature_4' => $request->feature_4,
            'feature_4_en' => $request->feature_4_en,

            'feature_5' => $request->feature_5,
            'feature_5_en' => $request->feature_5_en,

            'feature_6' => $request->feature_6,
            'feature_6_en' => $request->feature_6_en,

            'feature_7' => $request->feature_7,
            'feature_7_en' => $request->feature_7_en,

            'feature_8' => $request->feature_8,
            'feature_8_en' => $request->feature_8_en,

            'feature_9' => $request->feature_9,
            'feature_9_en' => $request->feature_9_en,

            'category_id' => $request->category_id,
            'car_id' => $request->car_id, // استخدام موديل Car
//            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.packages.index')->with('success', 'تم إضافة الباقة بنجاح!');
    }

    /**
     * عرض نموذج تعديل باقة موجودة.
     */
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $categories = Package_category::all();
        $cars = Car::all(); // الحصول على جميع أنواع السيارات
        return view('admin.packages.edit', compact('package', 'categories', 'cars'));
    }

    /**
     * تحديث باقة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $package = Package::findOrFail($id);

        $package->update([
            'name' => $request->name,
            'name_en' => $request->name_en,

            'price' => $request->price,
            'price_before_discount' => $request->price_before_discount,
            'hours' => $request->hours,
            
            'feature_1' => $request->feature_1,
            'feature_1_en' => $request->feature_1_en,

            'feature_2' => $request->feature_2,
            'feature_2_en' => $request->feature_2_en,

            'feature_3' => $request->feature_3,
            'feature_3_en' => $request->feature_3_en,

            'feature_4' => $request->feature_4,
            'feature_4_en' => $request->feature_4_en,

            'feature_5' => $request->feature_5,
            'feature_5_en' => $request->feature_5_en,

            'feature_6' => $request->feature_6,
            'feature_6_en' => $request->feature_6_en,

            'feature_7' => $request->feature_7,
            'feature_7_en' => $request->feature_7_en,

            'feature_8' => $request->feature_8,
            'feature_8_en' => $request->feature_8_en,

            'feature_9' => $request->feature_9,
            'feature_9_en' => $request->feature_9_en,

            'category_id' => $request->category_id,
            'car_id' => $request->car_id, // استخدام موديل Car
        ]);

        if ($request->hasFile('image')) {
            $img = $this->saveImage($request->file('image'), 'img/packages');
            $package->update(['image' => $img]);
        } elseif ($request->has('old_image')) {
            $package->update(['image' => $request->old_image]);
        }

        return redirect()->route('admin.dashboard.packages.index')->with('success', 'تم تعديل الباقة بنجاح!');
    }

    /**
     * حذف باقة من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return back()->with('success', 'تم حذف الباقة بنجاح!');
    }


    public function getPackages(Request $request)
{
    // تحقق من أن `car_id` و `category_id` موجودان في الطلب
    $request->validate([
        'car_id' => 'required|exists:cars,id',
        'category_id' => 'required|exists:package_categories,id',
    ]);

    // ابحث عن الحزم المتوافقة مع حجم السيارة والفئة وتكون مفعّلة فقط
    $packages = Package::where('car_id', $request->car_id)
        ->where('category_id', $request->category_id)
        ->where('active', 1) // ✅ إضافة الشرط لجلب الحزم النشطة فقط
        ->get();

    // إعادة الحزم كـ JSON
    return response()->json(['packages' => $packages]);
}

public function toggleActive(Request $request)
{
    $package = Package::findOrFail($request->id);
    $package->active = $request->active;
    $package->save();

    return response()->json(['message' => 'تم تحديث الحالة بنجاح!']);
}


}
