<?php

namespace App\Http\Controllers;

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

        $lessonLevelSubcategories = Sub_category::select('name')->where('question_category_id', 1)->get();
        $moduleLevelCategories = Question_category::select('name')->where('form_section_id', 2)->get();

        $lessonLevelDataOnline = [];
        $lessonLevelDataPhysical = [];

        foreach (session()->get("lessonLevelData") as $answerPage) {
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

        return view('results', [
            'lessonLevelSubcategories' => $lessonLevelSubcategories,
            'moduleLevelCategories' => $moduleLevelCategories,
            'lessonLevelDataOnline' => $lessonLevelDataOnline,
            'lessonLevelDataPhysical' => $lessonLevelDataPhysical,
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
