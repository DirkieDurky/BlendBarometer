<x-progress-step section="Resultaten" title="Overzicht en versturen" description="Het versturen van de ingevulde antwoorden" current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Overzicht en versturen</h1>
    <p>Je staat op het punt de resultaten van dit formulier definitief te versturen</p>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="{{ route('results') }}" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="" class="btn btn-primary">Opslaan en Versturen<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</x-progress-step>
