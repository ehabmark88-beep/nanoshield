<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{

    public function index()
    {
        $complaints = Complaint::with('branch')->get();
        return view('admin.complaints.index', compact('complaints'));
    }

    /**
     * عرض نموذج إنشاء شكوى جديدة.
     */
    public function create()
    {
        $branches = Branch::all();
        return view('admin.complaints.create', compact('branches'));
    }

    /**
     * تخزين شكوى جديدة في قاعدة البيانات.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'complaint_type' => 'required|string|max:255',
            'branch_id' => 'required|exists:branches,id',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'email' => 'nullable|email|max:255',
            'invoice_number' => 'required|string|max:255',
            'message' => 'required|string',
            'image.*' => 'nullable|mimes:jpeg,jpg,png,gif|max:2048', // السماح برفع عدة صور بصيغ معينة
        ], [
            'complaint_type.required' => 'يرجى تحديد نوع الشكوى.',
            'complaint_type.string' => 'نوع الشكوى يجب أن يكون نصًا.',
            'complaint_type.max' => 'نوع الشكوى يجب ألا يتجاوز 255 حرفًا.',

            'branch_id.required' => 'يرجى اختيار الفرع.',
            'branch_id.exists' => 'الفرع المحدد غير موجود.',

            'name.required' => 'يرجى إدخال اسمك.',
            'name.string' => 'الاسم يجب أن يكون نصًا.',
            'name.max' => 'الاسم يجب ألا يتجاوز 255 حرفًا.',

            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'phone_number.string' => 'رقم الجوال يجب أن يكون نصًا.',
            'phone_number.max' => 'رقم الجوال يجب ألا يتجاوز 15 حرفًا.',

            'email.email' => 'يرجى إدخال بريد إلكتروني صالح.',
            'email.max' => 'البريد الإلكتروني يجب ألا يتجاوز 255 حرفًا.',

            'invoice_number.required' => 'يرجى إدخال رقم الفاتورة.',
            'invoice_number.string' => 'رقم الفاتورة يجب أن يكون نصًا.',
            'invoice_number.max' => 'رقم الفاتورة يجب ألا يتجاوز 255 حرفًا.',

            'message.required' => 'يرجى كتابة الرسالة.',
            'message.string' => 'الرسالة يجب أن تكون نصًا.',

            'image.*.mimes' => 'الصور يجب أن تكون بصيغة jpeg أو jpg أو png أو gif.',
            'image.*.max' => 'حجم الصورة يجب أن لا يتجاوز 2 ميغابايت.',
        ]);



        // حفظ الصور
        $imagePaths = [];
        if ($request->hasFile('image')) {
            // التحقق من كل صورة يتم رفعها
            foreach ($request->file('image') as $image) {
                // استخدام دالة لحفظ الصورة وإرجاع مسارها
                $imagePaths[] = $this->saveImage($image, 'complaints/images');
            }
        }

        // تخزين الشكوى في قاعدة البيانات مع المسارات المحفوظة للصور
        Complaint::create([
            'complaint_type' => $request->complaint_type,
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'invoice_number' => $request->invoice_number,
            'image' => json_encode($imagePaths),  // تخزين المسارات كـ JSON array
            'message' => $request->message,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect('complaint')->with('success', 'تم إرسال الشكوى بنجاح!');
    }
    function saveImage($image, $folder)
    {
        $file_extension = $image->getClientOriginalExtension();
        $file_name = uniqid() . '.' . $file_extension;  // استخدام uniqid لضمان أن الاسم فريد
        $path = public_path($folder);

        // التأكد من أن المجلد موجود، وإن لم يكن، نقوم بإنشائه
        if (!file_exists($path)) {
            mkdir($path, 0777, true);  // إنشاء المجلد إذا لم يكن موجودًا
        }

        // حفظ الصورة في المجلد المحدد
        $image->move($path, $file_name);
        return $file_name;
    }


    /**
     * عرض نموذج تعديل شكوى موجودة.
     */
    public function edit($id)
    {
        $complaint = Complaint::with('branch')->findOrFail($id);
        $branches = Branch::all();
        return view('admin.complaints.edit', compact('complaint', 'branches'));
    }

    /**
     * تحديث شكوى في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $complaint->update([
            'complaint_type' => $request->complaint_type, // Ensure this matches the column name in the table
            'branch_id' => $request->branch_id,
            'name' => $request->name,
            'phone_number' => $request->phone_number, // Ensure this matches the column name in the table
            'email' => $request->email,
            'invoice_number' => $request->invoice_number,
            'message' => $request->message, // Updating the message field
        ]);

        if (!isset($request->image)) {
            $complaint->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/complaints');
            $complaint->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.complaints.index')->with('success', 'تم تعديل الشكوى بنجاح!');
    }

    /**
     * حذف شكوى من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->delete();

        return back()->with('success', 'تم حذف الشكوى بنجاح!');
    }
}
