<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Graph_legenda extends Model
{
    protected $table = 'graph_legenda';

    protected $fillable = [
        'color',
        'name',
        'description',
    ];

    public $timestamps = false;
}
