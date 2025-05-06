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
                'section_name' => 'BlendBarometer',
                'info' => 'De <strong>BlendBarometer</strong> geeft aan de hand van onderstaande onderdelen een indicatie van de kwaliteit van de Blended module<br><br>
                Dit gebeurt door middel van inzichtelijke grafieken.',
            ],
            [
                'section_name' => 'online en fysieke leeractiviteiten',
                'info' => 'Inventariseer welke online tools en welke fysieke werkvormen je gebruikt in je onderwijsmodule op het gebied van:<br>
                <ul>
                    <li>samenwerken</li>
                    <li>onderzoeken</li>
                    <li>informatie verwerven</li>
                    <li>discussiëren</li>
                    <li>oefenen</li>
                    <li>produceren</li>
                </ul>
                Dit zijn de 6 leertypes uit het <strong>ABC learning Design Model</strong>.<br><br>
                Deze inventarisatie geeft een beeld van de kwantiteit van je Blend. Er is geen goed of fout.<br><br>
                <strong>Werkwijze:</strong> Geef per leeractiviteit aan of je dit:
                <ul>
                    <li>niet gebruikt</li>
                    <li>af en toe (docentafhankelijk)</li>
                    <li>vaak (ingericht voor alle docenten)</li>
                </ul>
                De grafieken verschijnen op het volgende tabblad.',
            ],
            [
                'section_name' => 'module niveau',
                'info' => 'Hier worden vragen gesteld over de verhoudingen binnen je huidige Blended Learning leerarrangement,<br>
                op module niveau. Er is een onderverdeling gemaakt met vragen vanuit drie verschillende invalshoeken:<br>
                <strong>de samenhang, de organiseerbaarheid en de didactische uitvoering</strong>.<br><br>
                <strong>Werkwijze:</strong> Beoordeel de blokken met:
                <ul>
                    <li>groen (ja dit doen we)</li>
                    <li>oranje (dit kan beter)</li>
                    <li>rood (dit doen we niet tot weinig)</li>
                </ul>',
            ],
            [
                'section_name' => 'overzicht en resultaten',
                'info' => 'Tijdens het inhoudsrijke gesprek gaan we bespreken wat de status is van de huidige Blend.<br><br>
                Waarom zijn er bepaalde keuzes gemaakt?<br>
                Welke kansen zie je die je kunt oppakken?<br>
                Wat vind je dat er goed gaat en waar zie je mogelijkheden tot verbetering?<br><br>
                De uitkomst met de bijbehorende actiepunten worden vormgegeven in een <strong>adviesrapportage</strong>.',
            ],
            [
                'section_name' => 'adviesrapport',
                'info' => 'In dit adviesrapport staat beschreven wat de huidige status is van de kwaliteit van de Blend,
                zowel tekstueel als visueel zodat in 1 oogopslag duidelijk is wat de uitkomst is van de meting.
                Tevens worden er adviespunten meegegeven om tot een optimate Blend te komen die aansluit
                bij de leeruitkomsten.',
            ],
        ]);
    }
}
