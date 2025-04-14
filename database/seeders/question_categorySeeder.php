<?php

namespace Database\Seeders;

use App\Models\Question_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class question_categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Question_category::query()->delete();
        $categories = [
            [
                'id' => 1,
                'form_section_id' => 1,
                'name' => 'Fysieke leeractiviteiten',
                'description' => null,
            ],
            [
                'id' => 2,
                'form_section_id' => 1,
                'name' => 'Online leeractiviteiten',
                'description' => null,
            ],
            [
                'id' => 3,
                'form_section_id' => 2,
                'name' => 'Samenhangend',
                'description' => 'Context van de module',
            ],
            [
                'id' => 4,
                'form_section_id' => 2,
                'name' => 'Organisatorisch',
                'description' => 'Waar en wanneer vindt het onderwijs plaats',
            ],
            [
                'id' => 5,
                'form_section_id' => 2,
                'name' => 'Didactisch',
                'description' => 'Inrichten van de leeractiviteiten',
            ],
        ];

        Question_category::insert($categories);
    }
}
