<?php

namespace App\Http\Controllers;

use App\Models\Question_category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    public function getModuleLevel($categoryNr)
    {
        $category = Question_category::where('form_section_id', 2)->with('questions')->get()[$categoryNr - 1];

        $categoryCount = Question_category::where('form_section_id', 2)->count();

        $answers = session()->get('partTwoData', []);

        return view('module-level', compact('category', 'answers', 'categoryNr', 'categoryCount'));
    }

    public function storeInformation(Request $request, $categoryNr)
    {
        $answers = session()->get('partTwoData', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'vraag_')) {
                $questionId = str_replace('vraag_', '', $key);
                $answers[$categoryNr][$questionId] = $value;
            }
        }

        session()->put('partTwoData', $answers);
    }

    public function navigateModuleLevel(Request $request, $categoryNr)
    {
        $categoryCount = Question_category::where('form_section_id', 2)->count();

        $this->storeInformation($request, $categoryNr);

        $btn_action = $request->input('navigation');

        if ($btn_action === 'next') {
            if ($categoryNr < 1) {
                $categoryNr++;
                return redirect('/module-level/' . $categoryNr);
            } else {
                return redirect('/uitleg-overzicht-en-resultaten');
            }
        } elseif ($btn_action === 'previous') {
            if ($categoryNr >= $categoryCount) {
                $categoryNr--;
                return redirect('/module-level/' . $categoryNr);
            } else {
                return redirect('/lesson-level/' . Sub_category::count());
            }
        } else {
            dump('geen valide knop actie: ' . $btn_action);
        }
    }
}
