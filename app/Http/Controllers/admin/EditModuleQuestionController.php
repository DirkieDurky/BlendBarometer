<?php

namespace App\Http\Controllers\admin;

use App\Models\Content;
use App\Models\Sub_category;
use App\Models\Question_category;
use App\Models\Form_section;
use App\Models\Module_level_answer;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditModuleQuestionController
{
    public function index(): View
    {
        $lessonCategories = Question_category::where('form_section_id', 2)->get();
        $lessonSubCategories = Sub_category::all();
        $lessonQuestions = collect();
        $formSections = Form_section::all();
        $moduleLevelAnswer = Module_level_answer::all();

        foreach ($lessonCategories as $cat){
            $questions = Question::where("question_category_id", $cat->id)->get();
            $lessonQuestions = $lessonQuestions->merge($questions);        
        }
        return view('admin.edit-module-questions', 
            [
                'lessonCategories' => $lessonCategories,
                'lessonSubCategories' => $lessonSubCategories,
                'lessonQuestions' => $lessonQuestions,
                'formSections' => $formSections,
                'moduleLevelAnswer' => $moduleLevelAnswer

            ]
        );    }

    public function updateQuestion(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => ['required'],
            'label' => ['nullable'],
            'description' => ['nullable'],
        ]);

        Question::where('id', $request->question_id)->update([
                'text' => $request->input('text'),
                'label' => $request->input('label'),
                'description' => $request->input('description'),
         ]);
        return redirect()->route('admin.edit-module-questions');
    }

    public function createQuestion(Request $request): RedirectResponse
    {
        $request->validate([
            'text' => ['required'],
            'label' => ['nullable'],
            'description' => ['nullable'],
        ]);

        Question::create([
                'text' => $request->input('text'),
                'label' => $request->input('label'),
                'description' => $request->input('description'),
                'question_category_id' => $request->input('question_category_id'),
         ]);
        return redirect()->route('admin.edit-module-questions');
    }

    public function deleteQuestion($id) : RedirectResponse
    {
        Question::where('id', $id)->delete();
        return redirect()->route('admin.edit-module-questions');
    }

    public function updateCategory(Request $request) : RedirectResponse
    {
        // TODO
        $request->validate([
            'name' => ['required'],
            'form_section_id' => ['required'],
        ]);
        $toUpdate = Sub_category::where('name', $request->input('category_name'))->get();
        $firstSubCat = $toUpdate->first();
        
        $cat = Question_category::find($firstSubCat->id);

        if ($firstSubCat && (string)$request->input('form_section_id') !== (string)$cat->form_section_id)
        {
            Question_category::create([
                'form_section_id' => 2,
                'name' => $request->input('name'),
                'description' => null,
            ]);

            foreach ($toUpdate as $subCat){
                Question::where('sub_category_id', $subCat->id)->delete();
                $subCat->delete();
            }
        }
        else{
                Sub_category::where('name', $request->input('category_name'))->update([
                    'name' => $request->input('name'),
            ]);
        }

        return redirect()->route('admin.edit-lesson-questions');
    }

    public function createCategory(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required'],
            'form_section_id' => ['required'],
        ]);


        if ($request->input('form_section_id') == 1){
            Sub_category::create([
                'question_category_id' => 1,
                'name' => $request->input('name'),
            ]);
            Sub_category::create([
                'question_category_id' => 2,
                'name' => $request->input('name'),
            ]);
        }

        else if ($request->input('form_section_id') == 2){
            Question_category::create([
                'form_section_id' => 2,
                'name' => $request->input('name'),
                'description' => null,
         ]);
        }
        

        return redirect()->route('admin.edit-module-questions');
    }
    
    public function deleteCategory($id) : RedirectResponse
    {
        Question::where('question_category_id', $id)->delete();
        $category = Question_category::find($id);
        $category->delete();

        return redirect()->route('admin.edit-module-questions');
    }

    // public fun

}
