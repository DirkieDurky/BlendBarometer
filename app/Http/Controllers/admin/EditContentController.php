<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Content;

class EditContentController
{
    public function index(): View
    {
        $home = Content::where('section_name', 'intro_description')->value('info');
        return view('admin.edit-content', ['home' => $home]);
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
