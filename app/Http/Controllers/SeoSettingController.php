<?php

namespace App\Http\Controllers;

use App\Models\SeoSetting; // استخدم نموذج إعدادات السيو
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    /**
     * عرض إعدادات السيو لجميع الصفحات
     */
    public function index()
    {
        $seoSettings = SeoSetting::all();
        return view('admin.seo_settings.index', compact('seoSettings'));
    }

    /**
     * عرض صفحة تحرير إعدادات السيو
     */
    public function edit($id)
    {
        // العثور على إعداد السيو باستخدام المعرف
        $seoSetting = SeoSetting::findOrFail($id);
        return view('admin.seo_settings.edit', compact('seoSetting'));
    }

    /**
     * تحديث إعدادات السيو
     */
    public function update(Request $request, $id)
    {
        // العثور على إعداد السيو باستخدام المعرف
        $seoSetting = SeoSetting::findOrFail($id);

        // تحديث البيانات التي أرسلها المستخدم
        $seoSetting->update([
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'title_en' => $request->title_en,
            'meta_description_en' => $request->meta_description_en,
            'meta_keywords_en' => $request->meta_keywords_en,
        ]);

        // إعادة توجيه إلى صفحة إعدادات السيو مع رسالة نجاح
        return redirect()->route('admin.dashboard.seo-settings.index')->with('success', 'تم تحديث إعدادات السيو بنجاح');
    }

    /**
     * عرض صفحة إضافة إعدادات السيو
     */
    public function create()
    {
        return view('admin.seo_settings.create');
    }

    /**
     * تخزين إعدادات السيو الجديدة
     */
    public function store(Request $request)
    {
        // إضافة إعداد السيو الجديد
        SeoSetting::create([
            'page_name' => $request->page_name,
            'title' => $request->title,
            'meta_description' => $request->meta_description,
            'meta_keywords' => $request->meta_keywords,
            'title_en' => $request->title_en,
            'meta_description_en' => $request->meta_description_en,
            'meta_keywords_en' => $request->meta_keywords_en,
        ]);

        return redirect()->route('admin.dashboard.seo-settings.index')->with('success', 'تم إضافة إعدادات السيو بنجاح');
    }

    /**
     * حذف إعدادات السيو
     */
    public function destroy($id)
    {
        // العثور على إعداد السيو باستخدام المعرف وحذفه
        $seoSetting = SeoSetting::findOrFail($id);
        $seoSetting->delete();

        return redirect()->route('admin.dashboard.seo-settings.index')->with('success', 'تم حذف إعدادات السيو بنجاح');
    }
}
