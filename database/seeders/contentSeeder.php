<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class contentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Content::query()->delete();
        $contents = [
            // [
            //     'id' => 1,
            //     'section_name' => 'Les niveau',
            //     'info' => ''
            // ],
            [
                'id' => 2,
                'section_name' => 'Module niveau',
                'info' => 'Dit is aleen een test'
            ]//,
            // [
            //     'id' => 3,
            //     'section_name' => 'Inhoudsrijk gesprek',
            //     'info' => ''
            // ],
            // [
            //     'id' => 4,
            //     'section_name' => 'Advies rapportage',
            //     'info' => ''
            // ]
        ];

        Content::insert($contents);
    }
}
