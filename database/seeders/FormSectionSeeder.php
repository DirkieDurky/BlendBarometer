<?php

namespace Database\Seeders;

use App\Models\Form_section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormSectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form_section::query()->delete();
        $sections = [
            [
                'content_id' => 1,
                'description' => 'Wat is de kwaliteit van de Blend op lesniveau? Welke tools, applicaties en platformen gebruik je voor online leeractiviteiten en welke werkvormen gebruik je voor fysieke leeractiviteiten?',
            ],
            [
                'content_id' => 2,
                'description' => '',
            ],
        ];

        Form_section::insert($sections);
    }
}
