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
                'form_section_id' => 1,
                'name' => 'Samenhangend',
                'description' => 'Context van de module',
            ],
            [
                'form_section_id' => 1,
                'name' => 'Organisatorisch',
                'description' => 'Waar en wanneer vindt het onderwijs plaats',
            ],
            [
                'form_section_id' => 1,
                'name' => 'Didactisch',
                'description' => 'Inrichten van de leeractiviteiten',
            ],
        ];

        Question_category::insert($categories);
    }
}
