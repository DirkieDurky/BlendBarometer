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
                'text' => 'Ondersteunt de Blend de Constructive alignment?',
                'description' => 'Leeractiviteiten afgestemd op de leeruitkomsten en de toetsing, neem je de student hierin mee?',
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
                'text' => 'Is er rekening gehouden met flexibiliteit?',
                'description' => 'Keuze voor studenten in de vorm, de tijd, de plaats.',
            ],
            [
                'question_category_id' => 1,
                'sub_category_id' => null,
                'text' => 'Is er verbinding tussen de verschillende leeractiviteiten?',
                'description' => 'Kom je terug op het voorgaande/volgt het een het ander op.',
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Is er een onderbouwde keuze in synchrone en asynchrone momenten?',
                'description' => 'Hanteer je bv de voor-tijdens-na methode/flipping the classroom.',
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Is er een goede mix van online leermomenten en fysieke bijeenkomsten?',
                'description' => 'Is dit uitgewerkt in een Wave?',
            ],
            [
                'question_category_id' => 2,
                'sub_category_id' => null,
                'text' => 'Benut je de verschillende platformen zoals Brightspace/Teams?',
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
                'text' => 'Is er een goede mix van werkplek leren – leren op school – thuis leren?',
                'description' => null,
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er een harmonieuze mix van verschillende leeractiviteiten?',
                'description' => 'Genoeg variatie en activerende werkvormen.',
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Weten zowel de docenten als de studenten hoe ze met technologie moeten werken?',
                'description' => 'Krijgen ze instructie?',
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Worden de tools & applicaties door elke docent didactisch verantwoord ingezet?',
                'description' => 'Bv rekening houdend met de leerfasen.',
            ],
            [
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er genoeg afwisseling van de interactie momenten?',
                'description' => 'Variatie in docent-student / student-student / student-leermateriaal.',
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
