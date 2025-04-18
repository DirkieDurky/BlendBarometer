<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(ContentSeeder::class);
        $this->call(FormSectionSeeder::class);
        $this->call(QuestionCategorySeeder::class);
        $this->call(SubCategorySeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(AcademySeeder::class);
        $this->call(ModuleLevelAnswerSeeder::class);

        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
