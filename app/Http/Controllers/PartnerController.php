<?php

namespace App\Http\Controllers;
use App\Traits\ImageTrait;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.partners.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $img = $this->saveImage($request->image, 'img/partners');

        Partner::create([
            'name' => $request->name,
            'logo' => $img,
        ]);

        return redirect()->route('admin.dashboard.partners.index')->with('success', 'تم الارسال !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Partner $partner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $partner = Partner::findOrFail($id);
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        $partner->update([
            'name' => $request->name,
            'logo' => $request->image,
        ]);

        if (!isset($request->image)) {
            $partner->update([
                'logo' => $request->old_image
            ]);

        }else{
            $img = $this->saveImage($request->image, 'img/partners');
            $partner->update([
                'logo' => $img
            ]);
        }

        return redirect()->route('admin.dashboard.partners.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Partner::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
