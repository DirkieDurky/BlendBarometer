<?php

namespace App\Http\Controllers\admin;

use App\Models\Content;
use App\Models\Question_category;
use App\Models\Question;
use App\Models\Sub_category;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditLessonQuestionController
{
    public function index(): View
    {
        $lessonCategories = Question_category::where('form_section_id', 1)->get();
        $lessonSubCategories = Sub_category::all();
        $lessonQuestions = collect();

        foreach ($lessonCategories as $cat){
            $questions = Question::where("question_category_id", $cat->id)->get();
            $lessonQuestions = $lessonQuestions->merge($questions);        
        }
        return view('admin.edit-questions', 
            [
                'lessonCategories' => $lessonCategories,
                'lessonSubCategories' => $lessonSubCategories,
                'lessonQuestions' => $lessonQuestions,
            ]
        );
    }

    public function updateQuestion(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => ['required'],
            // 'label' => ['nullable'],
            'description' => ['nullable'],
        ]);

        Question::where('id', $request->question_id)->update([
                'text' => $request->input('text'),
                // 'label' => $request->input('label'),
                'description' => $request->input('description'),
         ]);
        return redirect()->route('admin.edit-questions');
    }

    public function createQuestion(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => ['required'],
        // 'label' => ['nullable'],
        'description' => ['nullable'],
        ]);

        Question::create([
                'text' => $request->input('text'),
                // 'label' => $request->input('label'),
                'description' => $request->input('description'),
                'question_category_id' => $request->input('question_category_id'),
                'sub_category_id' => $request->input('sub_category_id'),
         ]);
        return redirect()->route('admin.edit-questions');
    }

    public function deleteQuestion($id){
        Question::where('id', $id)->delete();
        return redirect()->route('admin.edit-questions');
    }
}
