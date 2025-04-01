<?php
 
namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Question_category;


class ModuleController extends Controller
{
    public function start() {
        $catagoryNr = 1;
        $catagoryName = Question_category::where('id', 1)->value('name');
        $questions = Question::where('question_category_id', 1)->get();

        return view('part2', compact('catagoryNr','catagoryName', 'questions'));
    }

    public function next($catagoryNr) 
    {
        

        $categoryIds = Question_category::where('form_section_id', 1)->pluck('id');
        return view('part2', ['catagoryNr'=> $catagoryNr]);
    }

    public function back($catagoryNr) 
    {
        return view('part2', ['catagoryNr'=> $catagoryNr - 1]);
    }
}