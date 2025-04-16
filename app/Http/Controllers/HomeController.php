<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Sub_category;
use App\Models\Question_category;

class HomeController extends Controller
{
    public function index()
    {
        $text = [
            'intro_description' => Content::where('section_name', 'intro_description')->first()->info,
        ];

        // session checks
        $hasInfo   = session()->has('name');
        $hasLesson = session()->has('lessonLevelData') && is_array(session('lessonLevelData')) && count(session('lessonLevelData')) > 0;
        $hasModule = session()->has('moduleLevelData') && is_array(session('moduleLevelData')) && count(session('moduleLevelData')) > 0;

        // decide the route of the "ga verder" button
        if ($hasLesson) {
            $lessonData = session('lessonLevelData');
            $lastLesson = max(array_keys($lessonData));
            $totalLessons = Sub_category::count();

            if ($lastLesson < $totalLessons) {
                // not all les-niveau steps completed
                $continueRoute = route('lesson-level', $lastLesson + 1);
            } else {
                // les-niveau complete, look at module-niveau
                if ($hasModule) {
                    $moduleData = session('moduleLevelData');
                    $lastModule = max(array_keys($moduleData));
                    $totalModules = Question_category::where('form_section_id', 2)->count();

                    if ($lastModule < $totalModules) {
                        $continueRoute = route('module-level', $lastModule + 1);
                    } else {
                        // everything comlete -> to results
                        $continueRoute = route('overview-and-results-info');
                    }
                } else {
                    // module-niveau not started, first question page
                    $continueRoute = route('module-level', 1);
                }
            }
        } elseif ($hasInfo) {
            // info completed, les-niveau not started, first question page
            $continueRoute = route('lesson-level', 1);
        } else {
            // no data in session -> to information
            $continueRoute = route('information');
        }

        // decide button tekst
        $buttonLabel = ($hasInfo || $hasLesson || $hasModule)
            ? 'Ga verder met invullen'
            : 'Start met invullen';

        // pass to view
        return view('home', array_merge(
            $text,
            ['continueRoute' => $continueRoute, 'buttonLabel' => $buttonLabel]
        ));
    }
}
