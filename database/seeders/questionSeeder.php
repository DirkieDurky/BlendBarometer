<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class questionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question::query()->delete();
        $questions = [
            [
                'question_category_id' => 1,
                'sub_category_id' => null,
                'text' => 'Ondersteunt de Blend de Constructive alignment? (leeractiviteiten afgestemd op de leeruitkomsten en de toetsing, neem je de student hierin mee?)',
                'description' => null,
            ],
            [
                'question_category_id' => 1,
                'sub_category_id' => null,
                'text' => 'Vind je dat de gekozen technologie bij de leeruitkomsten past?',
                'description' => null,
            ],
            [
                'question_category_id' => 1,
                'sub_category_id' => null,
                'text' => 'is er rekening gehouden met flexibiliteit? (keuze voor studenten in de vorm, de tijd, de plaats).',
                'description' => null,
            ],
            [
                'question_category_id' => 1,
                'sub_category_id' => null,
                'text' => 'is er verbinding tussen de verschillende leeractiviteiten? (kom je terug op het voorgaande/volgt het een het ander op)',
                'description' => null,
            ],
        ];

        Question::insert($questions);
    }
}
