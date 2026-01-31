<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partnerships = Partnership::all();
        return view('admin.partnerships.index', compact('partnerships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'organization_name' => 'required|string|max:255',
            'organization_type' => 'required|in:جهة حكومية,جهة خاصة,وكالة سيارات,معارض سيارات',
            'contact_person' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:partnerships,email',
            'request_details' => 'required|string',
            'commercial_registry_files.*' => 'required|file|max:2048', // التحقق من حجم الملف فقط
        ], [
            'organization_name.required' => 'اسم الجهة مطلوب.',
            'organization_type.required' => 'نوع الجهة مطلوب.',
            'contact_person.required' => 'اسم الشخص المسؤول مطلوب.',
            'phone_number.required' => 'رقم الجوال مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'request_details.required' => 'تفاصيل الطلب مطلوبة.',
            'commercial_registry_files.*.max' => 'حجم الملف يجب ألا يتجاوز 2 ميغابايت.',
        ]);

        // حفظ ملفات السجل التجاري
        $uploadedFiles = [];
        if ($request->hasFile('commercial_registry_files')) {
            foreach ($request->file('commercial_registry_files') as $file) {
                $uploadedFiles[] = $this->saveFile($file, 'partnerships/commercial_registries');
            }
        }

        // حفظ بيانات الشراكة
        Partnership::create([
            'organization_name' => $request->organization_name,
            'organization_type' => $request->organization_type,
            'contact_person' => $request->contact_person,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'request_details' => $request->request_details,
            'commercial_registry_files' => json_encode($uploadedFiles), // تخزين الملفات كـ JSON array
        ]);

        return redirect()->route('Partnerships_and_contracts')->with('success', 'تم إرسال الشراكة بنجاح!');
    }

    function saveFile($file, $folder)
    {
        $file_extension = $file->getClientOriginalExtension();
        $file_name = uniqid() . '.' . $file_extension;  // استخدام uniqid لضمان أن الاسم فريد
        $path = public_path($folder);

        // التأكد من أن المجلد موجود، وإن لم يكن، نقوم بإنشائه
        if (!file_exists($path)) {
            mkdir($path, 0777, true);  // إنشاء المجلد إذا لم يكن موجودًا
        }

        // حفظ الملف في المجلد المحدد
        $file->move($path, $file_name);
        return $file_name;
    }


    /**
     * Display the specified resource.
     */
    public function show(Partnership $partnership)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Partnership $partnership)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Partnership $partnership)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Partnership::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الشراكة بنجاح!');
    }
}
