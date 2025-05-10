<?php

namespace App\Http\Controllers;

use App\Models\GraphDescription;
use App\Models\Question;
use App\Models\Question_category;
use App\Models\Sub_category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class ResultsController extends Controller
{
    public function view()
    {
        if ($this->hasInsufficientData()) {
            return redirect(route('home'));
        }

        $lessonLevelPhysicalSubcategories = Sub_category::select('id', 'name')->where('question_category_id', 1)->get();
        $lessonLevelOnlineSubcategories = Sub_category::select('id', 'name')->where('question_category_id', 1)->get();

        $lessonLevelPhysicalQuestions = Question::select('sub_category_id', 'text')->where('question_category_id', 1)->get();
        $lessonLevelPhysicalQuestions = $lessonLevelPhysicalQuestions->mapToGroups(function ($item, $key) {
            return [$item['sub_category_id'] => $item->text];
        });

        $lessonLevelOnlineQuestions = Question::select('sub_category_id', 'text')->where('question_category_id', 2)->get();
        $lessonLevelOnlineQuestions = $lessonLevelOnlineQuestions->mapToGroups(function ($item, $key) {
            return [$item['sub_category_id'] => $item->text];
        });

        $lessonLevelGeneralDescription = GraphDescription::select('description')->where('graph_type', 'lesson-level-general')->get();
        $lessonLevelPhysicalDescriptions = GraphDescription::select('sub_category_id', 'description')->where('graph_type', 'physical')->get()->keyBy('sub_category_id');
        $lessonLevelOnlineDescriptions = GraphDescription::select('sub_category_id', 'description')->where('graph_type', 'physical')->get()->keyBy('sub_category_id');
        $moduleLevelGeneralDescription = GraphDescription::select('description')->where('graph_type', 'module-level-general')->get();

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

        $moduleLevelCategories = Question_category::join('question', 'question_category.id', '=', 'question.question_category_id')
            ->select('question_category.name', 'question.text')
            ->where('form_section_id', 2)
            ->get();

        $moduleLevelCategories = $moduleLevelCategories->mapToGroups(function ($item, $key) {
            return [$item['name'] => $item->text];
        });

        return view('results', [
            'lessonLevelPhysicalSubcategories' => $lessonLevelPhysicalSubcategories,
            'lessonLevelOnlineSubcategories' => $lessonLevelOnlineSubcategories,
            'lessonLevelPhysicalQuestions' => $lessonLevelPhysicalQuestions,
            'lessonLevelOnlineQuestions' => $lessonLevelOnlineQuestions,
            'lessonLevelGeneralDescription' => $lessonLevelGeneralDescription,
            'moduleLevelGeneralDescription' => $moduleLevelGeneralDescription,
            'lessonLevelPhysicalDescriptions' => $lessonLevelPhysicalDescriptions,
            'lessonLevelOnlineDescriptions' => $lessonLevelOnlineDescriptions,
            'lessonLevelDataOnline' => $lessonLevelDataOnline,
            'lessonLevelDataPhysical' => $lessonLevelDataPhysical,
            'lessonLevelDataAll' => $answers,
            'moduleLevelCategories' => $moduleLevelCategories,
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

    public function saveChart(Request $request)
    {
        // Retrieve the base64 image data from the incoming request
        $base64 = $request->input('image');
        
        if ($base64) {
            $base64 = str_replace('data:image/png;base64,', '', $base64);
            $base64 = str_replace(' ', '+', $base64);  // Replace spaces with '+' as per the base64 standard
            
            $imageData = base64_decode($base64);
            
            // Check if base64 decoding succeeded
            if ($imageData === false) {
                return response()->json(['error' => 'Base64 decoding failed'], 400);
            }

            // Define the path where the image will be saved
            $imagePath = 'images/temp/' . 'chart' . '.png';
            
            $saved = Storage::disk('public')->put($imagePath, $imageData);

            if ($saved) {
                return response()->json(['message' => 'Image saved successfully', 'path' => $imagePath]);
            } else {
                return response()->json(['error' => 'Failed to save image'], 500);
            }
        }
        return response()->json(['error' => 'No image data received'], 400);
    }
}
