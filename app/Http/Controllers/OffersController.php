<?php

namespace App\Http\Controllers;
use App\Traits\ImageTrait;

use App\Models\Offers;
use Illuminate\Http\Request;

class OffersController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offers = Offers::all();
        return view('admin.offers.index', compact('offers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/offers');

        Offers::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'image' => $img,
            'feature1' => $request->feature1,
            'feature1_ar' => $request->feature1_ar,

            'feature2' => $request->feature2,
            'feature2_ar' => $request->feature2_ar,

            'feature3' => $request->feature3,
            'feature3_ar' => $request->feature3_ar,

            'feature4' => $request->feature4,
            'feature4_ar' => $request->feature4_ar,

            'feature5' => $request->feature5,
            'feature5_ar' => $request->feature5_ar,

        ]);

        return redirect()->route('admin.dashboard.offers.index')->with('success', 'تم الارسال!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Offers $offers)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $offer = Offers::findOrFail($id);
        return view('admin.offers.edit', compact('offer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $offer = Offers::findOrFail($id);

        $offer->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'details' => $request->details,
            'details_ar' => $request->details_ar,

            'feature1' => $request->feature1,
            'feature1_ar' => $request->feature1_ar,

            'feature2' => $request->feature2,
            'feature2_ar' => $request->feature2_ar,

            'feature3' => $request->feature3,
            'feature3_ar' => $request->feature3_ar,

            'feature4' => $request->feature4,
            'feature4_ar' => $request->feature4_ar,

            'feature5' => $request->feature5,
            'feature5_ar' => $request->feature5_ar,
        ]);

        if (!isset($request->image)) {
            $offer->update([
                'image' => $request->old_image
            ]);
        } else {
            $img = $this->saveImage($request->image, 'img/offers');
            $offer->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.offers.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Offers::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
