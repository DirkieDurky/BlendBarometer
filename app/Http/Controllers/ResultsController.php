<?php

namespace App\Http\Controllers;

use App\Models\Question_category;
use Illuminate\View\View;

class ResultsController extends Controller
{
    public function view(): View
    {
        $partOneCategories = Question_category::select('name')->where('form_section_id', 0)->get();
        $partTwoCategories = Question_category::select('name')->where('form_section_id', 1)->get();

        return view('results', [
            'partOneCategories' => $partOneCategories,
            'partTwoCategories' => $partTwoCategories,
        ]);
    }
}
