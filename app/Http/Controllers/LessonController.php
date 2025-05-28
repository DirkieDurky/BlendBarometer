<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function view($id)
    {
        $totalSteps = Sub_category::count();
        $currentStep = $id;

        if ($currentStep < 1) {
            return redirect(route('intermediate.view', 'lesniveau'));
        } else if ($currentStep > $totalSteps) {
            return redirect(route('intermediate.view', 'moduleniveau'));
        }

        $subCategory = Sub_category::with('questionCategory')->findOrFail($id);
        $questions = $subCategory->questions;

        $answers = session()->get('lessonLevelData', []);

        $customQuestions = array_filter(
            $answers[$id] ?? [],
            fn($key) => str_starts_with($key, 'custom_'),
            ARRAY_FILTER_USE_KEY
        );

        $intermediate = Content::where('section_name', 'intermediate_lesson')->firstOrFail();
        $previous = ($currentStep > 1 || $intermediate->show) ? route('lesson-level.previous', $currentStep) : route('information');

        return view('lesson-level',
            compact('subCategory', 'questions', 'totalSteps', 'currentStep', 'answers', 'customQuestions', 'previous')
        );
    }

    public function next($subCategoryId)
    {
        return redirect(route('lesson-level', $subCategoryId + 1));
    }

    public function previous($subCategoryId)
    {
        return redirect(route('lesson-level', $subCategoryId - 1));
    }

    public function submit(Request $request, $subCategoryId)
    {
        $answers = session()->get('lessonLevelData', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question_')) {
                $questionId = str_replace('question_', '', $key);
                $answers[$subCategoryId][$questionId] = $value;
            }

            if (str_starts_with($key, 'custom_question_')) {
                $answers[$subCategoryId][$key] = $value;
            }
        }

        session()->put('lessonLevelData', $answers);

        return redirect(route('lesson-level.next', $subCategoryId));
    }
}
