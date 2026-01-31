<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{
    /**
     * عرض صفحة الإعدادات (تحويل مباشر للإيديت)
     */
    public function index()
    {
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);
        return view('admin.website_settings.index', compact('setting'));
    }

    /**
     * عرض فورم التعديل
     */
    public function edit($id)
    {
        $setting = WebsiteSetting::firstOrCreate(['id' => 1]);

        return view('admin.website_settings.edit', compact('setting'));
    }

    /**
     * تحديث الإعدادات
     */
    public function update(Request $request, $id)
    {
        $setting = WebsiteSetting::findOrFail(1);

        $data = $request->validate([
            'primary_color' => 'nullable|string|max:50',
            'secondary_color' => 'nullable|string|max:50',
            'third_color' => 'nullable|string|max:50',
            'facebook_url' => 'nullable|url',
            'instagram_url' => 'nullable|url',
            'snapchat_url' => 'nullable|url',
            'tiktok_url' => 'nullable|url',
            'youtube_url' => 'nullable|url',
            'x_platform_url' => 'nullable|url',
            'loyalty_points_days' => 'nullable|integer|min:0',
        ]);

        $setting->update($data);

        return redirect()->back()->with('success', 'Website settings updated successfully');
    }
}
