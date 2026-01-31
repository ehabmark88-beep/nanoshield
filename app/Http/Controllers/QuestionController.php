<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.questions.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Question::create([
            'question' => $request->question,
            'question_ar' => $request->question_ar,
            'answer_ar' => $request->answer_ar,
            'answer' => $request->answer,
        ]);

        return redirect()->route('admin.dashboard.questions.index')->with('success', 'تم الارسال !');
    }

    /**
     * Display the specified resource.
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $question = Question::findOrFail($id);

        $question->update([
            'question' => $request->question,
            'question_ar' => $request->question_ar,
            'answer_ar' => $request->answer_ar,
            'answer' => $request->answer,
        ]);
        return redirect()->route('admin.dashboard.questions.index')->with('success', 'تم التعديل بنجاح!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Question::findOrFail($id)->delete();
        return back()->with('success', 'تم الحذف بنجاح!');
    }
}
