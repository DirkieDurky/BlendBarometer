<?php

namespace Database\Seeders;

use App\Models\Academy;
use Illuminate\Container\Attributes\Database;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AcademySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Academy::query()->delete();
        $academies = [
            ['name' => 'Academie voor Management en Finance'],
            ['name' => 'Academie voor business en Entrepeneurship'],
            ['name' => 'Academie voor Welzijn, Educatie en Gezondheid'],
            ['name' => 'Academie voor Technologie en Innovatie'],
            ['name' => 'Academie voor Technologie en Design'],
            ['name' => 'Academie voor Deeltijd'],
            ['name' => 'Academie voor Associate degrees'],
            ['name' => 'Academie voor Duurzaam Gebouwde Omgeving'],
            ['name' => 'Academie voor Management, Bestuur en Finance'],
            ['name' => 'Academie voor Welzijn en Gezondheid'],
            ['name' => 'Academie voor Waardecreatie en Ondernemerschap'],
            ['name' => 'Avand Creative Innovation'],
            ['name' => 'Academie voor Life Schiences en Technologie'],
        ];

        Academy::insert($academies);
    }
}
