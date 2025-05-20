<?php

namespace App\Http\Controllers\admin;

use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EditContentController
{
    public function index(): View
    {
        $home = Content::where('section_name', 'intro_description')->value('info');

        $intermediateContent = [
            "information" => Content::where('section_name', 'intermediate_information')->value('info'),
            "lesson" => Content::where('section_name', 'intermediate_lesson')->value('info'),
            "module" => Content::where('section_name', 'intermediate_module')->value('info'),
            "results" => Content::where('section_name', 'intermediate_results')->value('info'),
        ];

        return view('admin.edit-content', ['home' => $home, 'intermediateContent' => $intermediateContent]);
    }

    public function updateHomeContent(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        Content::where('section_name', 'intro_description')->update(['info' => $request->content]);
        return redirect()->route('admin.edit-content');
    }
}
