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
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Is er een onderbouwde keuze in synchrone en asynchrone momenten? (hanteer je bv de voor-tijdens-na methode/flipping the classroom)',
                'description' => null,
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'is er een goede mix van online leermomenten en fysieke bijeenkomsten? (Is dit uitgewerkt in een Wave?)',
                'description' => null,
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Benut je de verschillende platformen zoals Brightspace/Teams? ',
                'description' => null,
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Gebruik je in Brightspace het Blended Template?',
                'description' => null,
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'is er een goede mix van werkplek leren – leren op school – thuis leren',
                'description' => null,
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er een harmonieuze mix van verschillende leeractiviteiten? (genoeg variatie en activerende werkvormen)',
                'description' => null,
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Weten zowel de docenten als de studenten hoe ze met technologie moeten werken? (krijgen ze instructie?)',
                'description' => null,
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Worden de tools & applicaties door elke docent didactisch verantwoord ingezet? (bv rekening houdend met de leerfasen)',
                'description' => null,
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er genoeg afwisseling van de interactie momenten? (variatie in docent-student / student-student / student-leermateriaal)',
                'description' => null,
            ],
        ];

        // leeg invulveld
        // [
        //     'question_category_id' => ,
        //     'sub_category_id' => null,
        //     'text' => '',
        //     'description' => null,
        // ],

        Question::insert($questions);
    }
}
