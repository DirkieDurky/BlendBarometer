<x-progress-step section="Resultaten" title="Overzicht en versturen" description="Het versturen van de ingevulde antwoorden" current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Overzicht en versturen</h1>
    <p>Je staat op het punt de resultaten van dit formulier definitief te versturen</p>
    <x-navigation-buttons :previous="route('results')" next="{{ route('send') }}" />
</x-progress-step>
