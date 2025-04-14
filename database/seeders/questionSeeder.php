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
                'id' => 1,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Post-it sessie',
                'description' => null,
            ],
            [
                'id' => 2,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Werkcollege',
                'description' => null,
            ],
            [
                'id' => 3,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Mindmap op flipovervel',
                'description' => null,
            ],
            [
                'id' => 4,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Groepsopdracht',
                'description' => null,
            ],
            [
                'id' => 5,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Informatie vergelijken',
                'description' => null,
            ],
            [
                'id' => 6,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Expert methode (Jigsaw)',
                'description' => null,
            ],
            [
                'id' => 7,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Boek/artikel/Blog lezen',
                'description' => null,
            ],
            [
                'id' => 8,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Hoorcollege',
                'description' => null,
            ],
            [
                'id' => 9,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Peerfeedback (tweetallen)',
                'description' => null,
            ],
            [
                'id' => 10,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Groepsdiscussie',
                'description' => null,
            ],
            [
                'id' => 11,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Debat',
                'description' => null,
            ],
            [
                'id' => 12,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Puzzel maken',
                'description' => null,
            ],
            [
                'id' => 13,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Spelvorm (memorie, kwartet)',
                'description' => null,
            ],
            [
                'id' => 14,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Rollenspel',
                'description' => null,
            ],
            [
                'id' => 15,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => '(Poster)presentatie',
                'description' => null,
            ],
            [
                'id' => 16,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => 'World cafe',
                'description' => null,
            ],
            [
                'id' => 17,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'MS Teams',
                'description' => null,
            ],
            [
                'id' => 18,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Whiteboard / Mural',
                'description' => null,
            ],
            [
                'id' => 19,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Brightspace',
                'description' => null,
            ],
            [
                'id' => 20,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Google Scholar',
                'description' => null,
            ],
            [
                'id' => 21,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Ai tool / ChatGPT',
                'description' => null,
            ],
            [
                'id' => 22,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Kennisclips',
                'description' => null,
            ],
            [
                'id' => 23,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Podcast luisteren',
                'description' => null,
            ],
            [
                'id' => 24,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Interactieve video/audio/doc',
                'description' => null,
            ],
            [
                'id' => 25,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Discussie fora',
                'description' => null,
            ],
            [
                'id' => 26,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Peerfeedback met feedbackfruits',
                'description' => null,
            ],
            [
                'id' => 27,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'eLearnings',
                'description' => null,
            ],
            [
                'id' => 28,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MyMedia quiz',
                'description' => null,
            ],
            [
                'id' => 29,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Wooclap quiz',
                'description' => null,
            ],
            [
                'id' => 30,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MSForms',
                'description' => null,
            ],
            [
                'id' => 31,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Remindo',
                'description' => null,
            ],
            [
                'id' => 32,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'Podcast maken',
                'description' => null,
            ],
            [
                'id' => 33,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'ePortfolio',
                'description' => null,
            ],
            [
                'id' => 34,
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Ondersteunt de Blend de Constructive alignment?',
                'description' => 'Leeractiviteiten afgestemd op de leeruitkomsten en de toetsing, neem je de student hierin mee?',
            ],
            [
                'id' => 35,
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Vind je dat de gekozen technologie bij de leeruitkomsten past?',
                'description' => null,
            ],
            [
                'id' => 36,
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er rekening gehouden met flexibiliteit?',
                'description' => 'Keuze voor studenten in de vorm, de tijd, de plaats.',
            ],
            [
                'id' => 37,
                'question_category_id' => 3,
                'sub_category_id' => null,
                'text' => 'Is er verbinding tussen de verschillende leeractiviteiten?',
                'description' => 'Kom je terug op het voorgaande/volgt het een het ander op.',
            ],
            [
                'id' => 38,
                'question_category_id' => 4,
                'sub_category_id' => null,
                'text' => 'Is er een onderbouwde keuze in synchrone en asynchrone momenten?',
                'description' => 'Hanteer je bv de voor-tijdens-na methode/flipping the classroom.',
            ],
            [
                'id' => 39,
                'question_category_id' => 4,
                'sub_category_id' => null,
                'text' => 'Is er een goede mix van online leermomenten en fysieke bijeenkomsten?',
                'description' => 'Is dit uitgewerkt in een Wave?',
            ],
            [
                'id' => 40,
                'question_category_id' => 4,
                'sub_category_id' => null,
                'text' => 'Benut je de verschillende platformen zoals Brightspace/Teams?',
                'description' => null,
            ],
            [
                'id' => 41,
                'question_category_id' => 4,
                'sub_category_id' => null,
                'text' => 'Gebruik je in Brightspace het Blended Template?',
                'description' => null,
            ],
            [
                'id' => 42,
                'question_category_id' => 4,
                'sub_category_id' => null,
                'text' => 'Is er een goede mix van werkplek leren – leren op school – thuis leren?',
                'description' => null,
            ],
            [
                'id' => 43,
                'question_category_id' => 5,
                'sub_category_id' => null,
                'text' => 'Is er een harmonieuze mix van verschillende leeractiviteiten?',
                'description' => 'Genoeg variatie en activerende werkvormen.',
            ],
            [
                'id' => 44,
                'question_category_id' => 5,
                'sub_category_id' => null,
                'text' => 'Weten zowel de docenten als de studenten hoe ze met technologie moeten werken?',
                'description' => 'Krijgen ze instructie?',
            ],
            [
                'id' => 45,
                'question_category_id' => 5,
                'sub_category_id' => null,
                'text' => 'Worden de tools & applicaties door elke docent didactisch verantwoord ingezet?',
                'description' => 'Bv rekening houdend met de leerfasen.',
            ],
            [
                'id' => 46,
                'question_category_id' => 5,
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
