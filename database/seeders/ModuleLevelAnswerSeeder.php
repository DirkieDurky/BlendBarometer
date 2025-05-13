<?php

namespace Database\Seeders;

use App\Models\Module_level_answer;
use Illuminate\Database\Seeder;

class ModuleLevelAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Module_level_answer::query()->delete();
        $categories = [
            [
                'answer' => "explore",
                'description' => "De techniek wordt nog onderzocht of overwogen. Er is interesse, maar er is nog geen structurele toepassing.",
            ],
            [
                'answer' => "apply",
                'description' => "De techniek wordt al daadwerkelijk gebruikt in het onderwijs, maar nog op kleine schaal of experimenteel.",
            ],
            [
                'answer' => "plan",
                'description' => "Er is een concreet en gedeeld plan om de techniek structureel te implementeren in het vak.",
            ],
            [
                'answer' => "anchored",
                'description' => "De techniek is volledig geïntegreerd in het vak en hoort bij de standaard werkwijze. Het gebruik is geborgd en duurzaam.",
            ],
        ];

        Module_level_answer::insert($categories);
    }
}
