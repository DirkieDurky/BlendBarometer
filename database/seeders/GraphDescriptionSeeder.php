<?php

namespace Database\Seeders;

use App\Models\GraphDescription;
use Illuminate\Database\Seeder;

class GraphDescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GraphDescription::query()->delete();

        $graphDescriptions = [
            [
                'graph_type' => 'lesson-level-general',
                'sub_category_id' => null,
                'description' => 'Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau in het algemeen',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 2,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 3,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 4,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 5,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'physical',
                'sub_category_id' => 6,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 7,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 8,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 9,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 10,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 11,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
            [
                'graph_type' => 'online',
                'sub_category_id' => 12,
                'description' => 'Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.',
            ],
        ];

        GraphDescription::insert($graphDescriptions);
    }
}
