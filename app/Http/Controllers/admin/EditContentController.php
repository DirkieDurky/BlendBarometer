<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Sub_category;
use App\Models\GraphDescription;

class EditContentController
{
    public function index(): View
    {
        $home = Content::where('section_name', 'intro_description')->value('info');

        $lessonLevelPhysicalSubcategories = Sub_category::select('sub_category.name',"sub_category.id", 'graph_description.description')
            ->leftJoin('graph_description', function($join) {
                $join->on('sub_category.id', '=', 'graph_description.sub_category_id')
             ->where('graph_description.graph_type', '=', 'physical');
        })
        ->where('sub_category.question_category_id', 1)
        ->get();

        $lessonLevelOnlineSubcategories = Sub_category::select('sub_category.name',"sub_category.id", 'graph_description.description')
            ->leftJoin('graph_description', function($join) {
                $join->on('sub_category.id', '=', 'graph_description.sub_category_id')
             ->where('graph_description.graph_type', '=', 'online');
        })
        ->where('sub_category.question_category_id', 2)
        ->get();
        
        $generalLessonLevelDescription = GraphDescription::select('id','description')->where('graph_type','lesson-level-general')->first();

        $generalModuleDescription = GraphDescription::select('id','description')->where('graph_type','module-level-general')->first();

        return view('admin.edit-content', ['home' => $home, 
            'lessonLevelPhysicalSubcategories' => $lessonLevelPhysicalSubcategories, 
            'lessonLevelOnlineSubcategories' => $lessonLevelOnlineSubcategories,
            'generalLessonLevelDescription' => $generalLessonLevelDescription,
            'generalModuleDescription' => $generalModuleDescription,
        ]);
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
        $descriptions = $request->input('physical');
        foreach($descriptions as $description){
            $this->UpdateChartDescription($description);
        }

        $descriptions = $request->input('online');
        foreach($descriptions as $description){
            $this->UpdateChartDescription($description);
        }

        $generalLessonLevelDescription = $request->input('general_lesson_level');
        $description = GraphDescription::find($generalLessonLevelDescription['id']);
        if($description)
        {
            $description->update(['description' => $generalLessonLevelDescription['description']]);
        }

        $generalModuleDescription = $request->input('general_module');
        $description = GraphDescription::find($generalModuleDescription['id']);
        if($description)
        {
            $description->update(['description' => $generalModuleDescription['description']]);
        }
        return redirect()->route('admin.edit-content');
    }

    private function UpdateChartDescription($description)
    {
        if (!isset($description['id']) || !isset($description['description'])) {
                return; // skip if data is incomplete
            }

        $row = GraphDescription::where('sub_category_id', $description['id'])->first();

        if ($row) {
            // Update existing
            $row->update(['description' => $description['description']]);
        } else {
            $category = Sub_category::find($description['id']);
            if($category){
                            GraphDescription::create([
                'sub_category_id' => $description['id'],
                'graph_type' => $category->question_category_id == 1 ? 'physical' : 'online',
                'description' => $description['description'],
            ]);
            }
        }
    }
}
