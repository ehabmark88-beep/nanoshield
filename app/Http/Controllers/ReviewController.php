<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class ReviewController extends Controller
{
        use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reviews = Review::all();
        return view('admin.reviews.index', compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reviews.create');
    }

    /**
     * Store a newly created resource in storage.
     */
  public function store(Request $request)
{
    $arabicImage = null;
    $englishImage = null;

    if ($request->hasFile('arabic_review_image')) {
        $arabicImage = $this->saveImage(
            $request->arabic_review_image,
            'uploads/reviews'
        );
    }

    if ($request->hasFile('english_review_image')) {
        $englishImage = $this->saveImage_1(
            $request->english_review_image,
            'uploads/reviews'
        );
    }

    Review::create([
        'name' => $request->name,
        'name_ar' => $request->name_ar,
        'review' => $request->review,
        'review_ar' => $request->review_ar,
        'arabic_review_images' => $arabicImage,
        'english_review_images' => $englishImage,
    ]);

    return redirect()
        ->route('admin.dashboard.reviews.index')
        ->with('success', 'تم الارسال !');
}


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $review= Review::findOrFail($id);
        return view('admin.reviews.edit', compact('review'));
    }

    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $review = Review::findOrFail($id);

    $arabicImage = $review->arabic_review_images;
    $englishImage = $review->english_review_images;

    if ($request->hasFile('arabic_review_image')) {
        $arabicImage = $this->saveImage(
            $request->arabic_review_image,
            'uploads/reviews'
        );
    }

    if ($request->hasFile('english_review_image')) {
        $englishImage = $this->saveImage_1(
            $request->english_review_image,
            'uploads/reviews'
        );
    }

    $review->update([
        'name' => $request->name,
        'name_ar' => $request->name_ar,
        'review' => $request->review,
        'review_ar' => $request->review_ar,
        'arabic_review_images' => $arabicImage,
        'english_review_images' => $englishImage,
    ]);

    return redirect()
        ->route('admin.dashboard.reviews.index')
        ->with('success', 'تم التعديل بنجاح!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Review::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
