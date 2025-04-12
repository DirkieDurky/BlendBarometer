<?php

namespace Database\Seeders;

use App\Models\FormSection;
use App\Models\Content;
use App\Models\Question;
use App\Models\QuestionCategory;
use App\Models\SubCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Content::updateOrInsert(
            ['id' => 1],
            [
                'section_name' => 'Fysieke en Online Leeractiviteiten',
                'info' => 'Overzicht van verschillende leeractiviteiten en hoe deze fysiek en online worden ingezet.'
            ]
        );

        FormSection::updateOrInsert(
            ['id' => 1],
            [
                'content_id' => 1,
                'description' => 'Wat is de kwaliteit van de Blend op lesniveau? Welke tools, applicaties en platformen gebruik je voor online leeractiviteiten en welke werkvormen gebruik je voor fysieke leeractiviteiten?'
            ]
        );

        $categories = [
            [
                'id' => 1,
                'form_section_id' => 1,
                'description' => 'Fysieke leeractiviteiten',
            ],
            [
                'id' => 2,
                'form_section_id' => 1,
                'description' => 'Online leeractiviteiten',
            ],
        ];
        
        foreach ($categories as $category) {
            QuestionCategory::updateOrInsert(
                ['id' => $category['id']],
                [
                    'form_section_id' => $category['form_section_id'],
                    'description' => $category['description'],
                ]
            );
        }

        $subCategories = [
            [
                'id' => 1,
                'question_category_id' => 1,
                'name' => 'Samenwerken',
            ],
            [
                'id' => 2,
                'question_category_id' => 1,
                'name' => 'Onderzoeken',
            ],
            [
                'id' => 3,
                'question_category_id' => 1,
                'name' => 'Informatie verwerven',
            ],
            [
                'id' => 4,
                'question_category_id' => 1,
                'name' => 'Discussieren',
            ],
            [
                'id' => 5,
                'question_category_id' => 1,
                'name' => 'Oefenen',
            ],
            [
                'id' => 6,
                'question_category_id' => 1,
                'name' => 'Produceren',
            ],
            [
                'id' => 7,
                'question_category_id' => 2,
                'name' => 'Samenwerken',
            ],
            [
                'id' => 8,
                'question_category_id' => 2,
                'name' => 'Onderzoeken',
            ],
            [
                'id' => 9,
                'question_category_id' => 2,
                'name' => 'Informatie verwerven',
            ],
            [
                'id' => 10,
                'question_category_id' => 2,
                'name' => 'Discussieren',
            ],
            [
                'id' => 11,
                'question_category_id' => 2,
                'name' => 'Oefenen',
            ],
            [
                'id' => 12,
                'question_category_id' => 2,
                'name' => 'Produceren',
            ],
        ];

        foreach ($subCategories as $subCategory) {
            SubCategory::updateOrInsert(
                ['id' => $subCategory['id']],
                [
                    'question_category_id' => $subCategory['question_category_id'],
                    'name' => $subCategory['name'],
                ]
            );
        }

        $questions = [
            [
                'id' => 1,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Post-it sessie'
            ],
            [
                'id' => 2,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Werkcollege'
            ],
            [
                'id' => 3,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Mindmap op flipovervel'
            ],
            [
                'id' => 4,
                'question_category_id' => 1,
                'sub_category_id' => 1,
                'text' => 'Groepsopdracht'
            ],
            [
                'id' => 5,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Informatie vergelijken'
            ],
            [
                'id' => 6,
                'question_category_id' => 1,
                'sub_category_id' => 2,
                'text' => 'Expert methode (Jigsaw)'
            ],
            [
                'id' => 7,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Boek/artikel/Blog lezen'
            ],
            [
                'id' => 8,
                'question_category_id' => 1,
                'sub_category_id' => 3,
                'text' => 'Hoorcollege'
            ],
            [
                'id' => 9,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Peerfeedback (tweetallen)'
            ],
            [
                'id' => 10,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Groepsdiscussie'
            ],
            [
                'id' => 11,
                'question_category_id' => 1,
                'sub_category_id' => 4,
                'text' => 'Debat'
            ],
            [
                'id' => 12,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Puzzel maken'
            ],
            [
                'id' => 13,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Spelvorm (memorie, kwartet)'
            ],
            [
                'id' => 14,
                'question_category_id' => 1,
                'sub_category_id' => 5,
                'text' => 'Rollenspel'
            ],
            [
                'id' => 15,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => '(Poster)presentatie'
            ],
            [
                'id' => 16,
                'question_category_id' => 1,
                'sub_category_id' => 6,
                'text' => 'World cafe'
            ],
            [
                'id' => 17,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'MS Teams'
            ],
            [
                'id' => 18,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Whiteboard / Mural'
            ],
            [
                'id' => 19,
                'question_category_id' => 2,
                'sub_category_id' => 7,
                'text' => 'Brightspace'
            ],
            [
                'id' => 20,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Google Scholar'
            ],
            [
                'id' => 21,
                'question_category_id' => 2,
                'sub_category_id' => 8,
                'text' => 'Ai tool / ChatGPT'
            ],
            [
                'id' => 22,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Kennisclips'
            ],
            [
                'id' => 23,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Podcast luisteren'
            ],
            [
                'id' => 24,
                'question_category_id' => 2,
                'sub_category_id' => 9,
                'text' => 'Interactieve video/audio/doc'
            ],
            [
                'id' => 25,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Discussie fora'
            ],
            [
                'id' => 26,
                'question_category_id' => 2,
                'sub_category_id' => 10,
                'text' => 'Peerfeedback met feedbackfruits'
            ],
            [
                'id' => 27,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'eLearnings'
            ],
            [
                'id' => 28,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MyMedia quiz'
            ],
            [
                'id' => 29,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Wooclap quiz'
            ],
            [
                'id' => 30,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'MSForms'
            ],
            [
                'id' => 31,
                'question_category_id' => 2,
                'sub_category_id' => 11,
                'text' => 'Remindo'
            ],
            [
                'id' => 32,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'Podcast maken'
            ],
            [
                'id' => 33,
                'question_category_id' => 2,
                'sub_category_id' => 12,
                'text' => 'ePortfolio'
            ],

            

        ];
        
        foreach ($questions as $question) {
            Question::updateOrInsert(
                ['id' => $question['id']],
                [
                    'question_category_id' => $question['question_category_id'],
                    'sub_category_id' => $question['sub_category_id'],
                    'text' => $question['text']
                ]
            );
        }
    }
}