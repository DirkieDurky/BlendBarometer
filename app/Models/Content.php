<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table = 'content';

    protected $fillable = [
        'id',
        'section_name',
        'info',
    ];

    public function formSections()
    {
        return $this->hasMany(FormSection::class);
    }
}
