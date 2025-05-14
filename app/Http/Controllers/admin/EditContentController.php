<?php

namespace App\Http\Controllers\admin;

use Illuminate\View\View;

class EditContentController
{
    public function index(): View
    {
        return view('admin.edit-content');
    }
}
