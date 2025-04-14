<x-progress-step section="Resultaten" title="Uitleg overzicht en versturen" description="Informatie over versturen" current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Uitleg overzicht en versturen</h1>
    <p>Op de volgende pagina staan grafieken. Deze zijn gemaakt op basis van de ingevulde antwoorden. Per grafiek staat er uitleg over wat deze aangeeft.
        De grafieken worden na het afronden verstuurd naar een ICTO coach. Deze zal een gesprek inplannen om de resultaten te bespreken en
        mogelijk suggesties te geven voor het verbeteren van het onderwijs. Na het gesprek wordt er een rapport opgesteld waar deze grafieken in terug komen.
    </p>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="{{ route('module-level', $categoryCount) }}" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="{{ route('results') }}" class="btn btn-primary">Volgende<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</x-progress-step>
