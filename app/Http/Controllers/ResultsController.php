<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Question_category;
use App\Models\Sub_category;

class ResultsController extends Controller
{
    public function view()
    {
        if ($this->hasInsufficientData()) 
        {
            return redirect(route('home'));
        }

        $lessonLevelSubcategories = Sub_category::select('name')->where('question_category_id', 1)->get();
        $moduleLevelCategories = Question_category::select('name')->where('form_section_id', 2)->get();

        $lessonLevelDataOnline = [];
        $lessonLevelDataPhysical = [];

        foreach (session()->get("lessonLevelData") as $answerPage) 
        {
            $question = Question::where('id', key($answerPage))->select('question_category_id', 'sub_category_id');
            $total = 0;

            foreach ($answerPage as $answer) 
            {
                $total += $answer;
            }

            if ($question->value('question_category_id') == 1) 
            {
                $lessonLevelDataOnline[] = $total;
            } 
            else if ($question->value('question_category_id') == 2) 
            {
                $lessonLevelDataPhysical[] = $total;
            }
        }

        return view('results', [
            'lessonLevelSubcategories' => $lessonLevelSubcategories,
            'moduleLevelCategories' => $moduleLevelCategories,
            'lessonLevelDataOnline' => $lessonLevelDataOnline,
            'lessonLevelDataPhysical' => $lessonLevelDataPhysical,
        ]);
    }

    public function overviewAndResultsInfoView()
    {
        if ($this->hasInsufficientData()) 
        {
            return redirect(route('home'));
        }

        $categoryCount = Question_category::where('form_section_id', 2)->count();
        return view('overview-and-results-info', compact('categoryCount'));
    }

    public function overviewAndSendView()
    {
        if ($this->hasInsufficientData()) 
        {
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
