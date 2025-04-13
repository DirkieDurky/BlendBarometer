<?php
 
namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Question_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ModuleController extends Controller
{
    public function getModuleLevel($categoryNr) {
        $category = Question_category::where('id', $categoryNr)->with('questions')->first();

        $maxCategoryId = Question_category::where('form_section_id', 1)->max('id');

        $answers = session()->get('answers', []);

        return view('module-section', compact('category', 'answers', 'maxCategoryId'));
    }

    public function storeInformation(Request $request, $categoryNr)
    {
        $answers = session()->get('answers', []);
    
        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'vraag_')) {
                $questionId = str_replace('vraag_', '', $key);
                $answers[$categoryNr][$questionId] = $value;
            }
        }
    
        session()->put('answers', $answers);
    }

    public function navigateModuleLevel(Request $request, $categoryNr) 
    {
        $this->storeInformation($request, $categoryNr);

        $btn_action = $request->input('navigation');

        if ($btn_action === 'next') {
            $maxCategoryId = Question_category::where('form_section_id', 1)->max('id');
            if ($categoryNr < $maxCategoryId) {
                $categoryNr++;
                return redirect('/deel2/'.$categoryNr);
            } else {
                //vervang met link naar volgende pagina
                return redirect('/deel2/'.$categoryNr);
            }
        }
        elseif ($btn_action === 'previous') {
            $minCategoryId = Question_category::where('form_section_id', 1)->min('id');
            if ($categoryNr > $minCategoryId) {
                $categoryNr--;
                return redirect('/deel2/'.$categoryNr);
            } else {
                //vervang met link naar vorige pagina
                return redirect('/deel2/'.$categoryNr);
            }
        } else {
            dump('geen valide knop actie: '.$btn_action);
        }
    }
}