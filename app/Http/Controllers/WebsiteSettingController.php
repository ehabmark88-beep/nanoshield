<?php

namespace App\Http\Controllers;

use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WebsiteSettingController extends Controller
{
    /**
     * عرض صفحة الإعدادات (عرض فقط)
     */
    public function index()
    {
        // دايمًا نضمن وجود سجل واحد
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);
        return view('admin.website-settings.index', compact('setting'));
    }

    /**
     * عرض فورم التعديل
     */
    public function edit()
    {
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);
        return view('admin.website-settings.edit', compact('setting'));
    }

    /**
     * تحديث الإعدادات
     */
    public function update(Request $request)
    {
        // نشتغل دايمًا على سجل واحد
        $setting = WebsiteSetting::findOrFail(1);

        $data = $request->validate([
            // الألوان
            'primary_color'        => 'nullable|string|max:50',
            'secondary_color'      => 'nullable|string|max:50',
            'third_color'          => 'nullable|string|max:50',

            // السوشيال
            'facebook_url'         => 'nullable|url',
            'instagram_url'        => 'nullable|url',
            'snapchat_url'         => 'nullable|url',
            'tiktok_url'           => 'nullable|url',
            'youtube_url'          => 'nullable|url',
            'x_platform_url'       => 'nullable|url',

            // نقاط الولاء
            'loyalty_points_days'  => 'nullable|integer|min:0',
            'loyalty_points_conversion' => 'nullable|integer|min:1', // 🔥 جديد (مثلاً 100 نقطة)


            // 🔥 إعدادات العرض
            'offer_title'       => 'nullable|string|max:255',
            'offer_title_en'       => 'nullable|string|max:255',
            'offer_code'           => 'nullable|string|max:100',
        ]);

        $setting->update($data);

        return redirect()->back()
            ->with('success', 'تم تحديث إعدادات الموقع بنجاح');
    }
}
