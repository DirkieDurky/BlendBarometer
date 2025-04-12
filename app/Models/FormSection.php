<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSection extends Model
{
    protected $fillable = [
        'id',
        'content_id',
        'description',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function questionCategories()
    {
        return $this->hasMany(QuestionCategory::class);
    }
}
