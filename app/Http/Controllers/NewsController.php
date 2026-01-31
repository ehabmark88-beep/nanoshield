<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    use ImageTrait;

    /**
     * عرض قائمة الأخبار.
     */
    public function index()
    {
        $newsItems = News::all();
        return view('admin.news.index', compact('newsItems'));
    }

    /**
     * عرض نموذج إنشاء خبر جديد.
     */
    public function create()
    {
        return view('admin.news.create');
    }

    /**
     * تخزين خبر جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/news');

        News::create([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'more_details' => $request->more_details,
            'more_details_ar' => $request->more_details_ar,

            'image' => $img,
            'link' => $request->link, // إضافة حقل الرابط
        ]);

        return redirect()->route('admin.dashboard.media.index')->with('success', 'تم إضافة الخبر بنجاح!');
    }

    /**
     * عرض نموذج تعديل خبر موجود.
     */
    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('admin.news.edit', compact('news'));
    }

    /**
     * تحديث خبر في قاعدة البيانات.
     */
    public function update(Request $request, $id)
    {
        $news = News::findOrFail($id);

        $news->update([
            'title' => $request->title,
            'title_ar' => $request->title_ar,
            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'more_details' => $request->more_details,
            'more_details_ar' => $request->more_details_ar,
            
            'link' => $request->link, // تحديث حقل الرابط
        ]);

        if (!isset($request->image)) {
            $news->update([
                'image' => $request->old_image,
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/news');
            $news->update([
                'image' => $img,
            ]);
        }

        return redirect()->route('admin.dashboard.media.index')->with('success', 'تم تعديل الخبر بنجاح!');
    }

    /**
     * حذف خبر من قاعدة البيانات.
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return back()->with('success', 'تم حذف الخبر بنجاح!');
    }
}
