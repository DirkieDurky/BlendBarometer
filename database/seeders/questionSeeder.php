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
                'description' => 'Ideeën verzamelen en structureren met post-its.',
            ],
            [
                'id' => 2,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Werkcollege',
                'description' => 'Interactieve les waarin theorie direct wordt toegepast.',
            ],
            [
                'id' => 3,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Mindmap op flipovervel',
                'description' => 'Visueel structureren van kennis met een mindmap.',
            ],
            [
                'id' => 4,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Groepsopdracht',
                'description' => 'Samenwerken aan een gezamenlijke taak.',
            ],
            [
                'id' => 5,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Informatie vergelijken',
                'description' => 'Verschillende bronnen of perspectieven analyseren.',
            ],
            [
                'id' => 6,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Expert methode (Jigsaw)',
                'description' => 'Leren door elkaar expert te maken op deelonderwerpen.',
            ],
            [
                'id' => 7,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Boek/artikel/Blog lezen',
                'description' => 'Verwerken van kennis via geschreven bronnen.',
            ],
            [
                'id' => 8,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Hoorcollege',
                'description' => 'Docent draagt kennis over in een klassikale setting.',
            ],
            [
                'id' => 9,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Peerfeedback (tweetallen)',
                'description' => 'Studenten geven elkaar gerichte terugkoppeling.',
            ],
            [
                'id' => 10,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Groepsdiscussie',
                'description' => 'Ideeën en meningen uitwisselen in groepsverband.',
            ],
            [
                'id' => 11,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Debat',
                'description' => 'Tegengestelde standpunten verdedigen met argumenten.',
            ],
            [
                'id' => 12,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Puzzel maken',
                'description' => 'Leren door informatie actief te ordenen.',
            ],
            [
                'id' => 13,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Spelvorm (memorie, kwartet)',
                'description' => 'Leren via speelse werkvormen gericht op herhaling.',
            ],
            [
                'id' => 14,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Rollenspel',
                'description' => 'Leren door in de huid van een ander te kruipen.',
            ],
            [
                'id' => 15,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => '(Poster)presentatie',
                'description' => 'Visueel en mondeling presenteren van kennis.',
            ],
            [
                'id' => 16,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => 'World cafe',
                'description' => 'Gespreksvorm met wisselende tafelgroepen.',
            ],
            [
                'id' => 17,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'MS Teams',
                'description' => 'Online samenwerken en communiceren.',
            ],
            [
                'id' => 18,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Whiteboard / Mural',
                'description' => 'Digitaal brainstormen en structureren van ideeën.',
            ],
            [
                'id' => 19,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Brightspace',
                'description' => 'Leeromgeving voor digitaal onderwijs en communicatie.',
            ],
            [
                'id' => 20,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Google Scholar',
                'description' => 'Zoeken naar wetenschappelijke bronnen.',
            ],
            [
                'id' => 21,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Ai tool / ChatGPT',
                'description' => 'Ondersteuning bij schrijven, brainstormen of analyseren.',
            ],
            [
                'id' => 22,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Kennisclips',
                'description' => 'Korte instructievideo’s over lesstof.',
            ],
            [
                'id' => 23,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Podcast luisteren',
                'description' => 'Leren door auditieve content.',
            ],
            [
                'id' => 24,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Interactieve video/audio/doc',
                'description' => 'Multimediaal leren met ingebouwde interacties.',
            ],
            [
                'id' => 25,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Discussie fora',
                'description' => 'Online uitwisselen van ideeën en meningen.',
            ],
            [
                'id' => 26,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Peerfeedback met feedbackfruits',
                'description' => 'Digitaal feedback geven volgens vaste structuur.',
            ],
            [
                'id' => 27,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'eLearnings',
                'description' => 'Zelfstandig leren via digitale modules.',
            ],
            [
                'id' => 28,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MyMedia quiz',
                'description' => 'Toetsing of oefening via het MyMedia platform.',
            ],
            [
                'id' => 29,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Wooclap quiz',
                'description' => 'Interactieve live quiz voor kennischeck.',
            ],
            [
                'id' => 30,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MSForms',
                'description' => 'Enquêtes en quizzen maken en invullen.',
            ],
            [
                'id' => 31,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Remindo',
                'description' => 'Digitale toetsomgeving voor examens of oefeningen.',
            ],
            [
                'id' => 32,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'Podcast maken',
                'description' => 'Leren door zelf content te creëren.',
            ],
            [
                'id' => 33,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'ePortfolio',
                'description' => 'Online dossier waarin leerresultaten worden verzameld.',
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
