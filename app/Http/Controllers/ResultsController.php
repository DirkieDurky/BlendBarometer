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
            return redirect('/');
        }

        $partOneCategories = Question_category::select('name')->where('form_section_id', 1)->get();
        $partOneSubcategories = Sub_category::select('name')->where('question_category_id', 1)->get();
        $partTwoCategories = Question_category::select('name')->where('form_section_id', 2)->get();

        $partOneDataOnline = [];
        $partOneDataPhysical = [];

        foreach (session()->get("partOneData") as $answerPage) {
            $question = Question::where('id', key($answerPage))->select('question_category_id', 'sub_category_id');
            $total = 0;

            foreach ($answerPage as $answer) {
                $total += $answer;
            }

            if ($question->value('question_category_id') == 1) {
                $partOneDataOnline[] = $total;
            } elseif ($question->value('question_category_id') == 2) {
                $partOneDataPhysical[] = $total;
            }
        }

        return view('results', [
            'partOneCategories' => $partOneCategories,
            'partOneSubcategories' => $partOneSubcategories,
            'partTwoCategories' => $partTwoCategories,
            'partOneDataOnline' => $partOneDataOnline,
            'partOneDataPhysical' => $partOneDataPhysical,
        ]);
    }

    public function overviewAndResultsInfoView()
    {
        if ($this->hasInsufficientData()) {
            return redirect('/');
        }

        $categoryCount = Question_category::where('form_section_id', 2)->count();
        return view('overview-and-results-info', compact('categoryCount'));
    }

    public function overviewAndSendView()
    {
        if ($this->hasInsufficientData()) {
            return redirect('/');
        }

        return view('overview-and-send');
    }

    private function hasInsufficientData()
    {
        session()->put('partOneDataPhysical', [12, 19, 3, 5, 2, 3]);
        session()->put('partOneDataOnline', [7, 15, 2, 0, 9, 3]);

        $partOneDataPhysical = session()->get('partOneDataPhysical', []);
        $partOneDataOnline = session()->get('partOneDataOnline', []);
        $partTwoData = session()->get('partTwoData', []);

        return !$partOneDataPhysical || !$partOneDataOnline || !$partTwoData;
    }
}
