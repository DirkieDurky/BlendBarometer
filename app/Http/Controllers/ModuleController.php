<?php

namespace App\Http\Controllers;

use App\Models\Module_level_answer;
use App\Models\Question_category;
use App\Models\Sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ModuleController extends Controller
{
    public function getModuleLevel($currentStep)
    {
        $category = Question_category::where('form_section_id', 2)->with('questions')->get()[$currentStep - 1];

        $totalSteps = Question_category::where('form_section_id', 2)->count();

        $descriptions = Module_level_answer::pluck('description', 'answer');

        $answers = session()->get('moduleLevelData', []);

        return view('module-level', compact('category', 'answers', 'currentStep', 'totalSteps', 'descriptions'));
    }

    public function submit(Request $request, $currentStep)
    {
        $answers = session()->get('moduleLevelData', []);

        foreach ($request->all() as $key => $value) {
            if (str_starts_with($key, 'question_')) {
                $questionId = str_replace('question_', '', $key);
                $answers[$currentStep][$questionId] = $value;
            }
        }

        session()->put('moduleLevelData', $answers);

        return redirect(route('module-level.next', $currentStep));
    }

    public function next(Request $request, $currentStep)
    {
        $totalSteps = Question_category::where('form_section_id', 2)->count();

        if ($currentStep >= $totalSteps) {
            return redirect(route('overview-and-results-info'));
        } else {
            return redirect(route('module-level', $currentStep + 1));
        }
    }

    public function previous(Request $request, $currentStep)
    {
        $this->submit($request, $currentStep);

        if ($currentStep <= 1) {
            return redirect(route('lesson-level', Sub_category::count()));
        } else {
            return redirect(route('module-level', $currentStep - 1));
        }
    }
}
