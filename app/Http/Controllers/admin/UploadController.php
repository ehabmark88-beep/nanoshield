<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // تحقق من نوع الملف
            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
            if (!in_array($file->getClientOriginalExtension(), $allowedExtensions)) {
                return response()->json(['error' => 'صيغة الملف غير مدعومة.'], 422);
            }

            // توليد اسم فريد للملف
            $filename = Str::random(20) . '.' . $file->getClientOriginalExtension();

            // حفظ الصورة في مجلد public/uploads
            $file->move(public_path('uploads'), $filename);

            // إرجاع الرابط الكامل
            return response()->json(['location' => asset('uploads/' . $filename)]);
        }

        return response()->json(['error' => 'لم يتم العثور على ملف'], 400);
    }
}
