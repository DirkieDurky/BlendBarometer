<?php

namespace App\Http\Controllers\admin;

use App\Models\Content;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditContentController
{
    public function index(): View
    {
        $home = Content::where('section_name', 'intro_description')->value('info');
        $intermediateContent = [
            "information" => Content::where('section_name', 'intermediate_information')->select('info', 'show')->first(),
            "lesson" => Content::where('section_name', 'intermediate_lesson')->select('info', 'show')->first(),
            "module" => Content::where('section_name', 'intermediate_module')->select('info', 'show')->first(),
            "results" => Content::where('section_name', 'intermediate_results')->select('info', 'show')->first(),
        ];

        try {
            $tab = request()->get('tab', 'home');
        } catch (\Exception $e) {
            $tab = 'home';
        }

        return view('admin.edit-content',
            [
                'tab' => $tab,
                'home' => $home,
                'intermediateContent' => $intermediateContent,
            ]
        );
    }

    public function updateHomeContent(Request $request): RedirectResponse
    {
        $request->validate([
            'content' => ['required'],
        ]);

        Content::where('section_name', 'intro_description')->update(['info' => $request->content]);
        return redirect()->route('admin.edit-content');
    }

    public function updateIntermediateContent(Request $request, string $sectionName): RedirectResponse
    {
        $request->validate([
            'content' => ['required'],
        ]);

        Content::where('section_name', 'intermediate_' . $sectionName)->update(['info' => $request->content]);
        return redirect()->route('admin.edit-content');
    }
}
