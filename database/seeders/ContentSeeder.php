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
                'info' => '<h1>Een&nbsp;<span style="color: rgb(0, 102, 204);">meetinstrument</span>&nbsp;om&nbsp;de&nbsp;kwaliteit&nbsp;van&nbsp;een&nbsp;<span style="color: rgb(0, 102, 204);">Blended&nbsp;module</span>&nbsp;te&nbsp;meten</h1>
                <p>De&nbsp;BlendBarometer&nbsp;is&nbsp;een&nbsp;meetinstrument&nbsp;om&nbsp;de&nbsp;kwaliteit&nbsp;
                van&nbsp;de&nbsp;Blended&nbsp;module&nbsp;te&nbsp;meten.&nbsp;Hiermee&nbsp;is&nbsp;inzichtelijk&nbsp;wat&nbsp;de&nbsp;
                huidige&nbsp;status&nbsp;is&nbsp;en&nbsp;wat&nbsp;er&nbsp;nog&nbsp;nodig&nbsp;is&nbsp;om&nbsp;uiteindelijk&nbsp;tot&nbsp;
                een&nbsp;kwalitatieve&nbsp;en&nbsp;harmonieuze&nbsp;mix&nbsp;van&nbsp;leeractiviteiten&nbsp;te&nbsp;komen.</p>',
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
