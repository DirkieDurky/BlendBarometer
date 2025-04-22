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
                'section_name' => 'intro_explanation',
                'info' => 'De BlendBarometer geeft aan de hand van onderstaande onderdelen,
                een indicatie van de kwaliteit van de Blended module door middel van inzichtelijke grafieken.',
            ],
            [
                'section_name' => 'intro_part1',
                'info' => 'Inventariseer welke online tools en welke fysieke werkvormen je gebruikt in je onderwijsmodule op het gebied van:
                samenwerken, onderzoeken, informatie verwerven, discussiëren oefenen en produceren. Dit zijn de 6 leertypes uit
                het ABC learning Design Model. Deze inverntarisatie geeft een beeld van de kwantiteit van je Blend. Er is geen goed of fout.
                Werkwijze: Geef per leeractiviteit aan of je dit niet gebruikt, af en toe (docentafhankelijk) of vaak (ingericht voor alle docenten).
                De grafieken verschijnen op het volgende tabblad.',
            ],
            [
                'section_name' => 'intro_part2',
                'info' => 'Hier worden vragen gesteld over de verhoudingen binnen je huidige Blended Learning leerarrangement,
                op module niveau. Er is een onderverdeling gemaakt met vragen vanuit drie verschillende invalshoeken: de samenhang,
                de organiseerbaarheid en de didactische uitvoering. Werkwijze: Beoordeel de blokken met groen (ja dit doen we),
                oranje (dit kan beter) of rood (dit doen we niet tot weinig).',
            ],
            [
                'section_name' => 'intro_part3',
                'info' => 'Tijdens het inhoudsrijke gesprek gaan we bespreken wat de status is van de huidige Blend.
                Waarom zijn er bepaalde keuzes gemaakt? Welke kansen zie je die je kunt oppakken? Wat vind je
                dat er goed gaat en waar zie je mogelijkheden tot verbetering? De uitkomst met de bijbehorende
                actiepunten worden vormgegeven in een adviesrapportage.',
            ],
            [
                'section_name' => 'intro_part4',
                'info' => 'In dit adviesrapport staat beschreven wat de huidige status is van de kwaliteit van de Blend,
                zowel tekstueel als visueel zodat in 1 oogopslag duidelijk is wat de uitkomst is van de meting.
                Tevens worden er adviespunten meegegeven om tot een optimate Blend te komen die aansluit
                bij de leeruitkomsten.',
            ],
        ]);
    }
}
