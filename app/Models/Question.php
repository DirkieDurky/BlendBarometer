<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = "question";

    protected $fillable = [
        'id',
        'question_category_id',
        'sub_category_id',
        'text',
    ];

    public function questionCategory()
    {
        return $this->belongsTo(QuestionCategory::class);
    }

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

//     public function questionCategory()
//     {
//         return $this->belongsTo(Question_category::class);
// >>>>>>> develop
//     }

}