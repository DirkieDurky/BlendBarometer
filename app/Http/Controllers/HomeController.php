<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;

class HomeController extends Controller
{
    public function index()
    {
        $text = [
            'intro_description' => Content::where('section_name', 'intro_description')->first()->info,
            'intro_explanation' => Content::where('section_name', 'intro_explanation')->first()->info,
            'intro_part1' => Content::where('section_name', 'intro_part1')->first()->info,
            'intro_part2' => Content::where('section_name', 'intro_part2')->first()->info,
            'intro_part3' => Content::where('section_name', 'intro_part3')->first()->info,
            'intro_part4' => Content::where('section_name', 'intro_part4')->first()->info,
        ];

        return view('home', $text);
    }
}
