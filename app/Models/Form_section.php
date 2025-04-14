<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Form_section extends Model
{
    protected $table = 'form_section';

    protected $fillable = [
        'id',
        'content_id',
        'description',
    ];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function questionCategory()
    {
        return $this->hasMany(Question_category::class);
    }
}
