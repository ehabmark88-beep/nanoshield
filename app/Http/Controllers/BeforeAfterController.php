<?php

namespace App\Http\Controllers;

use App\Traits\ImageTrait;
use App\Models\Before_after;
use Illuminate\Http\Request;

class BeforeAfterController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Before_after::all();
        return view('admin.before_after.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.before_after.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'image_before' => 'required|image',
            'image_after' => 'required|image',
        ]);

//        $imgBefore = $this->saveImage($request->image_before, 'img/before_after');
//        $imgAfter = $this->saveImage($request->image_after, 'img/before_after');

        if ($request->hasFile('image_before')) {
            $imgBefore = $this->saveImage($request->image_before, 'img/before_after');
        }

        if ($request->hasFile('image_after')) {
            $imgAfter = $this->saveImage($request->image_after, 'img/before_after');
        }

        Before_after::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'details' => $request->details,
            'details_ar' => $request->details_ar,
            'image_before' => $imgBefore,
            'image_after' => $imgAfter,
        ]);

        return redirect()->route('admin.dashboard.before_after.index')->with('success', 'تمت إضافة الصورة بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show($beforeAfter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $item = Before_after::findOrFail($id);
        return view('admin.before_after.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = Before_after::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'details' => 'required|string',
            'image_before' => 'image',
            'image_after' => 'image',
        ]);

        $item->name = $request->name;
        $item->name_ar = $request->name_ar;
        $item->details_ar = $request->details_ar;
        $item->details = $request->details;



        if ($request->hasFile('image_before')) {
            $item->image_before = $this->saveImage($request->image_before, 'img/before_after');
        }

        if ($request->hasFile('image_after')) {
            $item->image_after = $this->saveImage($request->image_after, 'img/before_after');
        }

        $item->save();

        return redirect()->route('admin.dashboard.before_after.index')->with('success', 'تم تحديث الصورة بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Before_after::findOrFail($id)->delete();
        return back()->with('success', 'تم حذف الصورة بنجاح!');
    }
}
