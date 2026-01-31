<?php

namespace App\Http\Controllers;

use App\Models\form_faq;
use Illuminate\Http\Request;

class FormFaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = form_faq::all();
        return view('admin.form-faq.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.form-faq.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'اسم العميل مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
        ]);

        // Store the FAQ (استفسار العميل)
        form_faq::create([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('questions')->with('success', 'تم إرسال استفسارك بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(FormFaq $formFaq)
    {
        return view('admin.form-faq.show', compact('formFaq'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FormFaq $formFaq)
    {
        return view('admin.form-faq.edit', compact('formFaq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FormFaq $formFaq)
    {
        // Validate the incoming request
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:15',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ], [
            'name.required' => 'اسم العميل مطلوب.',
            'email.required' => 'البريد الإلكتروني مطلوب.',
            'message.required' => 'الرسالة مطلوبة.',
        ]);

        // Update the FAQ
        $formFaq->update([
            'name' => $request->name,
            'phone_number' => $request->phone_number,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return redirect()->route('admin.dashboard.form-faq.index')->with('success', 'تم تعديل الاستفسار بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(form_faq $formFaq)
    {
        $formFaq->delete();
        return back()->with('success', 'تم حذف الاستفسار بنجاح!');
    }
}
