<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionCategory extends Model
{
    protected $fillable = [
        'id',
        'form_section_id',
        'description',
    ];

    public function formSection()
    {
        return $this->belongsTo(FormSection::class);
    }

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
