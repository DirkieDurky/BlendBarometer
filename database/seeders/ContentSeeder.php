<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('content')->insert([
            [
                'section_name' => 'intro_description',
                'info' => 'De BlendBarometer is een meetinstrument om de kwaliteit van de Blended module te meten.
                Hiermee is inzichtelijk wat de huidige status is en wat er nog nodig is
                om uiteindelijk tot een kwalitatieve en harmonieuze mix van leeractiviteiten te komen.',
            ],
            [
                'section_name' => 'intermediate_information',
                'info' => 'De <strong>BlendBarometer</strong> geeft aan de hand van onderstaande onderdelen een indicatie van de kwaliteit van de Blended module:<br><br>
                <ul>
                    <li>lesniveau</li>
                    <li>moduleniveau</li>
                </ul>
                Dit gebeurt door middel van inzichtelijke grafieken.',
            ],
            [
                'section_name' => 'intermediate_lesson',
                'info' => 'Inventariseer welke online tools en welke fysieke werkvormen je gebruikt in je onderwijsmodule op het gebied van:<br>
                <ul>
                    <li>samenwerken</li>
                    <li>onderzoeken</li>
                    <li>informatie verwerven</li>
                    <li>discussiëren</li>
                    <li>oefenen</li>
                    <li>produceren</li>
                </ul>
                Dit zijn de 6 leertypes uit het <span lang="en"><strong>ABC learning Design Model</strong></span>.<br><br>
                Deze inventarisatie geeft een beeld van de kwantiteit van je Blend. Er is geen goed of fout.<br><br>
                <strong>Werkwijze:</strong> Geef per leeractiviteit aan of je dit:
                <ul>
                    <li>niet gebruikt</li>
                    <li>af en toe</li>
                    <li>vaak</li>
                </ul>',
            ],
            [
                'section_name' => 'intermediate_module',
                'info' => '<strong>Werkwijze:</strong> Beoordeel elk onderdeel van je huidige Blended Learning leerarrangement op module niveau. Kies per onderdeel één van de vier opties:<br>
                <ul>
                    <li>Verkennen</li>
                    <li>Toepassen</li>
                    <li>Duidelijk plan</li>
                    <li>Verankerd</li>
                </ul>',
            ],
            [
                'section_name' => 'intermediate_results',
                'info' => '<strong>Let op:</strong> Op de volgende pagina worden de grafieken weergegeven die de resultaten van de ingevulde onderdelen visualiseren. Deze grafieken bieden een overzicht van de huidige status en helpen bij het bepalen van de vervolgstappen.',
            ],
        ]);
    }
}
