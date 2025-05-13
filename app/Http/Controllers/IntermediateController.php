<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Sub_category;
use App\Models\Question_category;

class IntermediateController extends Controller
{
    public function view($sectionName)
    {
        
        $sectionMapping = [
            'gegevens' => 'intermediate_information',
            'lesniveau' => 'intermediate_lesson',
            'moduleniveau' => 'intermediate_module',
            'resultaten' => 'intermediate_results',
        ];

        if (array_key_exists($sectionName, $sectionMapping)) {
            $sectionName = $sectionMapping[$sectionName];
        } else {
            return redirect()->route('home')->with('error', 'Invalid section name.');
        }


        $content = Content::where('section_name', $sectionName)->firstOrFail();

        $staticContent = [
            'intermediate_information' => [
                'name' => 'BlendBarometer',
                'title' => 'Hoe werkt de Blend-Barometer?',
                'section' => 'Gegevens',
                'description' => '',
                'currentStepName' => 'information',
                'content' => $content,
                'previous' => route('home'),
                'next' => route('information'),
            ],
            'intermediate_lesson' => [
                'name' => 'online en fysieke leeractiviteiten',
                'title' => 'Wat is de volgende stap?',
                'section' => 'Les niveau',
                'description' => '',
                'currentStepName' => 'lessonLevel',
                'content' => $content,
                'previous' => route('information'),
                'next' => route('lesson-level', 1),
            ],
            'intermediate_module' => [
                'name' => 'module niveau',
                'title' => 'Wat is de volgende stap?',
                'section' => 'Module Niveau',
                'description' => '',
                'currentStepName' => 'moduleLevel',
                'content' => $content,
                'previous' => route('lesson-level', Sub_category::count()),
                'next' => route('module-level', 1),
            ],
            'intermediate_results' => [
                'name' => 'overzicht en resultaten',
                'title' => 'Wat is de volgende stap?',
                'section' => 'Resultaten',
                'description' => '',
                'currentStepName' => 'results',
                'content' => $content,
                'previous' => route('module-level', Question_category::where('form_section_id', 2)->count()),
                'next' => route('results'),
            ],
        ];

        if (array_key_exists($sectionName, $staticContent)) 
        {
            return view('intermediate', $staticContent[$sectionName]);
        }

        return redirect()->route('home')->with('error', 'Invalid section name.');
    }
}