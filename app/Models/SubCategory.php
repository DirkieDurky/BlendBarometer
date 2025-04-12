<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = [
        'id',
        'question_category_id',
        'name',
    ];

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
