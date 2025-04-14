<?php

namespace App\Http\Controllers;

use App\Models\Question_category;

class ResultsController extends Controller
{
    public function view()
    {
        if ($this->hasInsufficientData()) {
            return redirect('/');
        }

        $partOneCategories = Question_category::select('name')->where('form_section_id', 0)->get();
        $partTwoCategories = Question_category::select('name')->where('form_section_id', 1)->get();

        return view('results', [
            'partOneCategories' => $partOneCategories,
            'partTwoCategories' => $partTwoCategories,
        ]);
    }

    public function overviewAndResultsInfoView()
    {
        if ($this->hasInsufficientData()) {
            return redirect('/');
        }

        return view('overview-and-results-info');
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
