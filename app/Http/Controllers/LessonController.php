<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\SubCategory;
class LessonController extends Controller{

    public function start()
    {
        return $this->loadStep(1);
    }

    public function next($subCategoryId)
    {
        return $this->loadStep($subCategoryId + 1);
    }

    public function back($subCategoryId)
    {
        return $this->loadStep($subCategoryId - 1);
    }

    private function loadStep($subCategoryId)
    {
        $subCategory = SubCategory::with('questionCategory')->findOrFail($subCategoryId);
        $questions = $subCategory->questions;

        $answers = session()->get('answers', []);

        $totalSteps = SubCategory::count();
        $currentStep = $subCategoryId;

        return view('part1', compact('subCategory', 'questions', 'totalSteps', 'currentStep', 'answers'));
    }

    public function storeAnswers(Request $request, $subCategoryId)
    {
        // Retrieve current answers from session
        $answers = session()->get('answers', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question_')) {
                // Extract the question id from the input name
                $questionId = str_replace('question_', '', $key);

                // Store the answer for this question
                $answers[$subCategoryId][$questionId] = $value;
            }
        }

        // Save the answers in the session
        session()->put('answers', $answers);

        return redirect()->route('deel1.next', $subCategoryId);
    }
}