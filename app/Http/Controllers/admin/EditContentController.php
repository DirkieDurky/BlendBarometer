<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Sub_category;
use App\Models\GraphDescription;
use Laravel\Pail\ValueObjects\Origin\Console;

class EditContentController
{
    public function index(): View
    {
        $home = Content::where('section_name', 'intro_description')->value('info');

        $lessonLevelPhysicalSubcategories = Sub_category::select('graph_description.id', 'sub_category.name', 'graph_description.description')
            ->leftJoin('graph_description', function($join) {
                $join->on('sub_category.id', '=', 'graph_description.sub_category_id')
             ->where('graph_description.graph_type', '=', 'physical');
        })
        ->where('sub_category.question_category_id', 1)
        ->get();

        $lessonLevelOnlineSubcategories = Sub_category::select('graph_description.id', 'sub_category.name', 'graph_description.description')
            ->leftJoin('graph_description', function($join) {
                $join->on('sub_category.id', '=', 'graph_description.sub_category_id')
             ->where('graph_description.graph_type', '=', 'online');
        })
        ->where('sub_category.question_category_id', 2)
        ->get();
        // dd($lessonLevelOnlineSubcategories);


        return view('admin.edit-content', ['home' => $home, 
            'lessonLevelPhysicalSubcategories' => $lessonLevelPhysicalSubcategories, 
            'lessonLevelOnlineSubcategories' => $lessonLevelOnlineSubcategories,]);
    }

    public function updateHomeContent(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        Content::where('section_name', 'intro_description')->update(['info' => $request->content]);
        return redirect()->route('admin.edit-content');
    }

    public function updateChartContent(Request $request)
    {
        $request->validate([
            'content' => ['required'],
        ]);

        Content::where('section_name', 'intro_description')->update(['info' => $request->content]);
        return redirect()->route('admin.edit-content');
    }
}
