<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Construction_service;
use Illuminate\Http\Request;

class ConstructionServiceController extends Controller
{

    use ImageTrait;

    public function index()
    {
        $services = Construction_service::all();
        return view('admin.construction_services.index', compact('services'));
    }

    /**
     * عرض نموذج إنشاء خدمة جديدة.
     */
    public function create()
    {
        return view('admin.construction_services.create');
    }

    /**
     * تخزين خدمة جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {
//        dd( $request->name, $request->name_en);
        $img = null;
        if ($request->image) {
            $img = $this->saveImage($request->image, 'img/construction_services');
        }

        Construction_service::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'details' => $request->details,
            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.construction_service.index')->with('success', 'تم إضافة الخدمة بنجاح!');
    }

    /**
     * عرض نموذج تعديل خدمة موجودة.
     */
    public function edit($id)
    {
        $service = Construction_service::findOrFail($id);
        return view('admin.construction_services.edit', compact('service'));
    }

    /**
     * تحديث خدمة في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $service = Construction_service::findOrFail($id);

        $service->update([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'details' => $request->details,
        ]);

        if (!isset($request->image)) {
            $service->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/construction_services');
            $service->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.construction_service.index')->with('success', 'تم تعديل الخدمة بنجاح!');
    }

    /**
     * حذف خدمة من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $service = Construction_service::findOrFail($id);
        $service->delete();

        return back()->with('success', 'تم حذف الخدمة بنجاح!');
    }
}
