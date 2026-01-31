<?php

namespace App\Http\Controllers;

use App\Models\Com_con;
use Illuminate\Http\Request;

class ComConController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $com_cons = Com_con::all();
        return view('admin.commercial_concession.index', compact('com_cons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'required|string|max:40',
            'nationality' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ], [
            'name.required' => 'يرجى إدخال اسم المتقدم.',
            'phone_number.required' => 'يرجى إدخال رقم الجوال.',
            'nationality.required' => 'يرجى إدخال الجنسية.',
            'city.required' => 'يرجى إدخال المدينة.',
            'country.required' => 'يرجى إدخال الدولة.',
        ]);


        // حفظ البيانات في قاعدة البيانات
        Com_con::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'nationality' => $request->nationality,
            'city' => $request->city,
            'country' => $request->country,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('form_commercial')->with('success', 'تم إرسال الطلب بنجاح!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Com_con $com_con)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Com_con $com_con)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Com_con $com_con)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Com_con::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
