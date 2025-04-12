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

        $customQuestion = $answers[$subCategoryId]['custom'] ?? null;

        return view('part1', compact('subCategory', 'questions', 'totalSteps', 'currentStep', 'answers', 'customQuestion'));
    }

    public function storeAnswers(Request $request, $subCategoryId)
    {
        $answers = session()->get('answers', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question_')) {
                $questionId = str_replace('question_', '', $key);
                $answers[$subCategoryId][$questionId] = $value;
            }
        }

        if ($request->has('custom_collab') && !empty($request->custom_collab)) {
            $customQuestion = $request->custom_collab;
            $answers[$subCategoryId]['custom'] = $customQuestion;
        }

        // Save the answers in the session
        session()->put('answers', $answers);

        return redirect()->route('deel1.next', $subCategoryId);
    }
}