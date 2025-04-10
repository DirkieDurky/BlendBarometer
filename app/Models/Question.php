<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";

    public function questionCategory()
    {
        return $this->belongsTo(Question_category::class);
    }
}
