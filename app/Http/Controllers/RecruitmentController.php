<?php

namespace App\Http\Controllers;

use App\Models\Recruitment;
use App\Models\Review;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class RecruitmentController extends Controller
{
    use ImageTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $recruitments = Recruitment::all();
        return view('admin.Recruitments.index', compact('recruitments'));
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
            'date_of_birth' => 'required|date',
            'email' => 'nullable|max:255',
            'phone' => 'required|string|max:15',
            'gender' => 'required|in:male,female',
            'job_position' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'training_courses' => 'nullable|string|max:1000',
            'cv.*' => 'required|mimes:pdf,doc,docx|max:2048', // Each file must be of valid type and size
        ], [
            'name.required' => 'الاسم مطلوب.',
            'date_of_birth.required' => 'تاريخ الميلاد مطلوب.',
            'phone.required' => 'رقم الهاتف مطلوب.',
            'gender.required' => 'الجنس مطلوب.',
            'job_position.required' => 'المسمى الوظيفي مطلوب.',
            'city.required' => 'المدينة مطلوبة.',
            'cv.*.mimes' => 'يجب أن تكون السيرة الذاتية بصيغة PDF أو DOC أو DOCX.',
            'cv.*.max' => 'حجم الملف يجب ألا يتجاوز 2 ميغابايت.',
        ]);

        // Save multiple CV files
        $uploadedCvs = [];
        if ($request->hasFile('cv')) {
            foreach ($request->file('cv') as $file) {
                $uploadedCvs[] = $this->saveImage($file, 'recruitment/cv');
            }
        }

        // Save recruitment data
        Recruitment::create([
            'name' => $request->name,
            'date_of_birth' => $request->date_of_birth,
            'email' => $request->email,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'job_position' => $request->job_position,
            'city' => $request->city,
            'training_courses' => $request->training_courses,
            'cv' => json_encode($uploadedCvs), // Store CVs as JSON array
        ]);

        return redirect('jobs')->with('success', 'تم الإرسال بنجاح!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Recruitment $recruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recruitment $recruitment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recruitment $recruitment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Recruitment::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
