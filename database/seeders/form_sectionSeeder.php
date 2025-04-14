<?php

namespace Database\Seeders;

use App\Models\Form_section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class form_sectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Form_section::query()->delete();
        $sections = [
            [
                'content_id' => 2,
                'description' => '',
            ],
        ];

        Form_section::insert($sections);
    }
}
