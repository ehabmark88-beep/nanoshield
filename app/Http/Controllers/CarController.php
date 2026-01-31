<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    use ImageTrait;
    public function index()
    {
        $cars = Car::all();
        return view('admin.cars.index', compact('cars'));
    }

    /**
     * عرض نموذج إنشاء سيارة جديدة.
     */
    public function create()
    {
        return view('admin.cars.create');
    }

    /**
     * تخزين سيارة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $this->saveImage($request->file('image'), 'img/cars');
        }

        Car::create([
            'size' => $request->size,
            'size_ar' => $request->size_ar,
            'details' => $request->details,
            'details_ar' => $request->details_ar,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.dashboard.cars.index')->with('success', 'تم إضافة السيارة بنجاح!');
    }

    /**
     * عرض نموذج تعديل سيارة موجودة.
     */
    public function edit($id)
    {
        $car = Car::findOrFail($id);
        return view('admin.cars.edit', compact('car'));
    }

    /**
     * تحديث سيارة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'size' => 'required|string|max:50',
            'details' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $car = Car::findOrFail($id);

        $imageName = $car->image; // احتفظ بالصورة القديمة في حال عدم تحميل صورة جديدة
        if ($request->hasFile('image')) {
            $imageName = $this->saveImage($request->file('image'), 'img/cars');
        }

        $car->update([
            'size' => $request->size,
            'size_ar' => $request->size_ar,
            'details_ar' => $request->details_ar,
            'details' => $request->details,
            'image' => $imageName,
        ]);

        return redirect()->route('admin.dashboard.cars.index')->with('success', 'تم تعديل السيارة بنجاح!');
    }

    /**
     * حذف سيارة من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);

        // حذف الصورة من المسار إذا كانت موجودة
        if ($car->image && file_exists(public_path('img/cars/'.$car->image))) {
            unlink(public_path('img/cars/'.$car->image));
        }

        $car->delete();

        return back()->with('success', 'تم حذف السيارة بنجاح!');
    }
}
