<?php

namespace App\Http\Controllers;

use App\Models\Com_con;
use App\Models\Contact_us;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact_us::all();
        return view('admin.contact_us.index', compact('contacts'));
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
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15', // Adjust max length as per your needs
            'email' => 'max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|min:10', // Ensure the message is at least 10 characters
        ], [
            // Custom error messages
            'name.required' => 'الاسم مطلوب.',
            'phone_number.required' => 'رقم الهاتف مطلوب.',
            'subject.required' => 'عنوان الموضوع مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
            'message.min' => 'يجب أن تحتوي الرسالة على 10 أحرف على الأقل.',
        ]);

        Contact_us::create($validatedData);

        return redirect()->route('contactus')->with('success', 'تم الارسال !');
    }

    /**\
     * Display the specified resource.
     */
    public function show(Contact_us $contact_us)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact_us $contact_us)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contact_us $contact_us)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Contact_us::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
