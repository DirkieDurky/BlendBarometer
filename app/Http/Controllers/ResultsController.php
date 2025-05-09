<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Question_category;
use App\Models\Sub_category;

class ResultsController extends Controller
{
    public function view()
    {
        if ($this->hasInsufficientData()) {
            return redirect(route('home'));
        }

        $lessonLevelSubcategories = Sub_category::select('id', 'name')->where('question_category_id', 1)->get();

        $lessonLevelPhysicalQuestions = Question::select('sub_category_id', 'text')->where('question_category_id', 1)->get();
        $lessonLevelPhysicalQuestions = $lessonLevelPhysicalQuestions->mapToGroups(function ($item, $key) {
            return [$item['sub_category_id'] => $item->text];
        });

        $lessonLevelOnlineQuestions = Question::select('sub_category_id', 'text')->where('question_category_id', 2)->get();
        $lessonLevelOnlineQuestions = $lessonLevelOnlineQuestions->mapToGroups(function ($item, $key) {
            return [$item['sub_category_id'] => $item->text];
        });

        $moduleLevelCategories = Question_category::select('name')->where('form_section_id', 2)->get();

        $lessonLevelDataOnline = [];
        $lessonLevelDataPhysical = [];

        $answers = session()->get("lessonLevelData");
        foreach ($answers as $answerPage) {
            $question = Question::where('id', key($answerPage))->select('question_category_id', 'sub_category_id');
            $total = 0;

            foreach ($answerPage as $answer) {
                $total += $answer;
            }

            if ($question->value('question_category_id') == 1) {
                $lessonLevelDataOnline[] = $total;
            } elseif ($question->value('question_category_id') == 2) {
                $lessonLevelDataPhysical[] = $total;
            }
        }

        return view('results', [
            'lessonLevelSubcategories' => $lessonLevelSubcategories,
            'lessonLevelPhysicalQuestions' => $lessonLevelPhysicalQuestions,
            'lessonLevelOnlineQuestions' => $lessonLevelOnlineQuestions,
            'moduleLevelCategories' => $moduleLevelCategories,
            'lessonLevelDataOnline' => $lessonLevelDataOnline,
            'lessonLevelDataPhysical' => $lessonLevelDataPhysical,
            'lessonLevelDataAll' => $answers,
        ]);
    }

    public function overviewAndResultsInfoView()
    {
        if ($this->hasInsufficientData()) {
            return redirect(route('home'));
        }

        $categoryCount = Question_category::where('form_section_id', 2)->count();
        return view('overview-and-results-info', compact('categoryCount'));
    }

    public function overviewAndSendView()
    {
        if ($this->hasInsufficientData()) {
            return redirect(route('home'));
        }

        return view('overview-and-send');
    }

    private function hasInsufficientData()
    {
        $lessonLevelData = session()->get('lessonLevelData');
        $moduleLevelData = session()->get('moduleLevelData');

        return !$lessonLevelData || !$moduleLevelData;
    }
}
