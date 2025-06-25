<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GraphLegendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('graph_legenda')->insert([
            [
                'color' => '#FC2200',
                'name' => 'Rood',
                'description' => 'slechte score, aandacht vereist',
            ],
            [
                'color' => '#F88F00',
                'name' => 'Oranje',
                'description' => 'matige score, verbetering aanbevolen',
            ],
            [
                'color' => '#F5D000',
                'name' => 'Geel',
                'description' => 'goede score, ruimte voor verbetering',
            ],
            [
                'color' => '#38A772',
                'name' => 'Groen',
                'description' => 'Sterke score, presteert goed',
            ],
            [
                'color' => '#E1D9D1',
                'name' => 'Wit',
                'description' => 'niet van toepassing',
            ],
        ]);
    }
}
