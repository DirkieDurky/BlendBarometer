<?php

namespace App\Http\Controllers;

use App\Models\Question_category;

class ResultsController extends Controller
{
    public function view()
    {
        return $this->redirectIfInsufficientData();

        $partOneCategories = Question_category::select('name')->where('form_section_id', 0)->get();
        $partTwoCategories = Question_category::select('name')->where('form_section_id', 1)->get();

        return view('results', [
            'partOneCategories' => $partOneCategories,
            'partTwoCategories' => $partTwoCategories,
        ]);
    }

    public function overviewAndResultsInfoView()
    {
        return $this->redirectIfInsufficientData();

        return view('overview-and-results-info');
    }

    public function overviewAndSendView()
    {
        return $this->redirectIfInsufficientData();

        return view('overview-and-send');
    }

    private function redirectIfInsufficientData()
    {
        $partOneDataPhysical = session()->get('partOneDataPhysical', []);
        $partOneDataOnline = session()->get('partOneDataOnline', []);
        $partTwoData = session()->get('partTwoData', []);

        if (!$partOneDataPhysical || !$partOneDataOnline || !$partTwoData) {
            return redirect('/');
        }
    }
}
