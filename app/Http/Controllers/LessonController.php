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

        $customQuestions = array_filter(
            $answers[$subCategoryId] ?? [],
            fn($key) => str_starts_with($key, 'custom_'),
            ARRAY_FILTER_USE_KEY
        );

        return view('part1', compact('subCategory', 'questions', 'totalSteps', 'currentStep', 'answers', 'customQuestions'));
    }

    public function storeAnswers(Request $request, $subCategoryId)
    {
        $answers = session()->get('answers', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question_')) {
                $questionId = str_replace('question_', '', $key);
                $answers[$subCategoryId][$questionId] = $value;
            }
    
            // Handle custom questions
            if (str_starts_with($key, 'custom_')) {
                $answers[$subCategoryId][$key] = $value;
            }
        }    

        // Save the answers in the session
        session()->put('answers', $answers);

        return redirect()->route('deel1.next', $subCategoryId);
    }
}