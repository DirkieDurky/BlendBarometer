<?php

namespace Database\Seeders;

use App\Models\Question_category;
use App\Models\Sub_category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sub_category::query()->delete();
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

        Sub_category::insert($subCategories);
    }
}
