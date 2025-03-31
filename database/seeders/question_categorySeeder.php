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
                'description' => null,
            ],
            [
                'form_section_id' => 1,
                'name' => 'Organisatorisch',
                'description' => null,
            ],
            [
                'form_section_id' => 1,
                'name' => 'Didactisch',
                'description' => null,
            ],
        ];

        Question_category::insert($categories);
    }
}
