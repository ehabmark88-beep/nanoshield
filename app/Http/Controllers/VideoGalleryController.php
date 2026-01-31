<?php

namespace App\Http\Controllers;

use App\Traits\VideoTrait;
use App\Models\Video_gallery;
use App\Models\Package;
use App\Models\Package_category; // تعديل الاسم ليتبع قواعد Laravel
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoGalleryController extends Controller
{
    use VideoTrait;

    /**
     * عرض قائمة الفيديوهات.
     */
    public function index()
    {
        $videos = Video_gallery::with('package', 'category')->get();
        return view('admin.video_gallery.index', compact('videos'));
    }

    /**
     * عرض نموذج إنشاء فيديو جديد.
     */
    public function create()
    {
        $packages = Package::all();
        $categories = Package_category::all(); // إذا كنت بحاجة إلى تصنيف الفيديوهات
        return view('admin.video_gallery.create', compact('packages', 'categories'));
    }

    /**
     * تخزين فيديو جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // تحقق من القواعد اللازمة
        $request->validate([
            'video_link' => 'nullable|url', // يجب أن يكون رابط الفيديو صحيحًا
            'details' => 'nullable|string',
        ]);

        Video_gallery::create([
            'video_link' => $request->video_link, // استخدام حقل الفيديو الجديد
            'details' => $request->details,
        ]);

        return redirect()->route('admin.dashboard.video_gallery.index')->with('success', 'تم إضافة الفيديو بنجاح!');
    }

    /**
     * عرض نموذج تعديل فيديو موجود.
     */
    public function edit($id)
    {
        $video = Video_gallery::findOrFail($id);
        $packages = Package::all();
        $categories = Package_category::all(); // إذا كنت بحاجة إلى تصنيف الفيديوهات
        return view('admin.video_gallery.edit', compact('video', 'packages', 'categories'));
    }

    /**
     * تحديث فيديو في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $video = Video_gallery::findOrFail($id);


        $updateData = [
            'video_link' => $request->video_link, // استخدام حقل الفيديو الجديد
            'details' => $request->details,
        ];

        // إذا تم تقديم رابط فيديو جديد، قم بتحديثه
        if ($request->filled('video_link')) {
            $updateData['video_link'] = $request->video_link;
        }

        $video->update($updateData);

        return redirect()->route('admin.dashboard.video_gallery.index')->with('success', 'تم تعديل الفيديو بنجاح!');
    }

    /**
     * حذف فيديو من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $video = Video_gallery::findOrFail($id);
        // إذا كان هناك ملف فيديو محلي، احذفه (إذا كان موجودًا)
        // لأننا أزلنا حقل الفيديو، نحتاج إلى استخدام المنطق المناسب هنا إذا كان لدينا أي تخزين محلي.

        $video->delete();

        return back()->with('success', 'تم حذف الفيديو بنجاح!');
    }
}
