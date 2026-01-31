<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Traits\ImageTrait;

class SliderController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sliders.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/sliders');

        Slider::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'title' => $request->title,
            'details' => $request->details,
//            'details_ar' => $request->details_ar,

            'image' => $img,
        ]);

        return redirect()->route('admin.dashboard.sliders.index')->with('success', 'تم الارسال !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $slider  = Slider::findOrFail($id);

        $slider ->update([
            'name' => $request->name,
            'name_ar' => $request->name_ar,

            'title' => $request->title,
            'details' => $request->details,
//            'details_ar' => $request->details_ar,
        ]);

        if (!isset($request->image)) {
            $slider->update([
                'image' => $request->old_image,
            ]);

        }else{
            $img = $this->saveImage($request->image, 'img/sliders');
            $slider->update([
                'image' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.sliders.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Slider::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
