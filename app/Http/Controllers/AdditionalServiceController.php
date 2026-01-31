<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use  App\Models\Additional_service;
use Illuminate\Http\Request;

class AdditionalServiceController extends Controller
{
    use ImageTrait;

    /**
     * عرض قائمة بالخدمات الإضافية.
     */
    public function index()
    {
        $services = Additional_service::all();
        return view('admin.additional_services.index', compact('services'));
    }

    /**
     * عرض نموذج إنشاء خدمة إضافية جديدة.
     */
    public function create()
    {
        return view('admin.additional_services.create');
    }

    /**
     * تخزين خدمة إضافية جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/additional_services');

        Additional_service::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details' => $request->details,
            'duration' => $request->duration,
            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.addition_service.index')->with('success', 'تم إنشاء الخدمة الإضافية بنجاح!');
    }

    /**
     * عرض نموذج تعديل خدمة إضافية موجودة.
     */
    public function edit($id)
    {
        $service = Additional_service::findOrFail($id);
        return view('admin.additional_services.edit', compact('service'));
    }

    /**
     * تحديث خدمة إضافية في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $service = Additional_service::findOrFail($id);

        $service->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'price' => $request->price,
            'details' => $request->details,
            'duration' => $request->duration,
        ]);

        if (!isset($request->image)) {
            $service->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/additional_services');
            $service->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.addition_service.index')->with('success', 'تم تعديل الخدمة الإضافية بنجاح!');
    }

    /**
     * حذف خدمة إضافية من قاعدة البيانات.
     */
    public function destroy($id)
    {
        Additional_service::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الخدمة الإضافية بنجاح!');
    }
}
