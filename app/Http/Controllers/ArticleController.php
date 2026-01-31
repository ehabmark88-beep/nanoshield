<?php

namespace App\Http\Controllers;

use App\Models\Offers;
use App\Models\Article;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    use ImageTrait;

    public function index()
    {
        $newsItems = Article::all();
        return view('admin.articles.index', compact('newsItems'));
    }

    public function create()
    {
        return view('admin.articles.create');
    }

    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/articles');

        // توليد slug نظيف
        $slug_en = Str::slug($request->article_url_en);
        $slug_ar = str_replace(' ', '-', trim($request->article_url_ar));

        Article::create([
            'title' => strip_tags($request->title),
            'title_ar' => strip_tags($request->title_ar),

            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'more_details' => $request->more_details,
            'more_details_ar' => $request->more_details_ar,

            'image' => $img,

            'article_title_ar' => $request->article_title_ar,
            'article_title_en' => $request->article_title_en,
            'article_meta_ar' => $request->article_meta_ar,
            'article_meta_en' => $request->article_meta_en,
            'article_meta_keyword_ar' => $request->article_meta_keyword_ar,
            'article_meta_keyword_en' => $request->article_meta_keyword_en,

            'article_url_ar' => $slug_ar,
            'article_url_en' => $slug_en,
        ]);

        return redirect()->route('admin.dashboard.articles.index')->with('success', 'تم إضافة المقال بنجاح!');
    }

    public function show($slug)
    {
        $locale = app()->getLocale();
        $column = $locale === 'ar' ? 'article_url_ar' : 'article_url_en';

        $article = Article::where($column, $slug)->firstOrFail();
        $offers = Offers::all();
        $related_articles = Article::where('id', '!=', $article->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        return view('admin.articles.show', compact('article', 'related_articles','offers'));
    }

    public function edit($id)
    {
        $news = Article::findOrFail($id);
        return view('admin.articles.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = Article::findOrFail($id);

        // توليد slug جديد في حال تغييره
        $slug_en = Str::slug($request->article_url_en);
        $slug_ar = str_replace(' ', '-', trim($request->article_url_ar));

        $news->update([
            'title' => strip_tags($request->title),
            'title_ar' => strip_tags($request->title_ar),

            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'more_details' => $request->more_details,
            'more_details_ar' => $request->more_details_ar,

            'article_title_ar' => $request->article_title_ar,
            'article_title_en' => $request->article_title_en,
            'article_meta_ar' => $request->article_meta_ar,
            'article_meta_en' => $request->article_meta_en,
            'article_meta_keyword_ar' => $request->article_meta_keyword_ar,
            'article_meta_keyword_en' => $request->article_meta_keyword_en,

            'article_url_ar' => $slug_ar,
            'article_url_en' => $slug_en,
        ]);

        if ($request->hasFile('image')) {
            $img = $this->saveImage($request->image, 'img/articles');
            $news->update([
                'image' => $img,
            ]);
        }

        return redirect()->route('admin.dashboard.articles.index')->with('success', 'تم تعديل المقال بنجاح!');
    }

    public function destroy($id)
    {
        $news = Article::findOrFail($id);
        $news->delete();
        return back()->with('success', 'تم حذف المقال بنجاح!');
    }
    
    public function toggleActive(Request $request)
{
    // البحث عن المقال باستخدام ID
    $article = Article::findOrFail($request->id);

    // تحديث قيمة الـ active
    $article->active = $request->active;
    $article->save();

    // إرجاع استجابة بنجاح التحديث
    return response()->json(['message' => 'تم تحديث الحالة بنجاح!']);
}

}
