<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;
use Illuminate\Http\Request;

class EditContentController
{
    public function index(): View
    {
        return view('admin.edit-content');
    }

    public function saveHomeContent(Request $request)
    {
        
    }
}
