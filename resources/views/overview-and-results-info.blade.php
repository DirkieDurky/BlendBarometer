<x-progress-step section="Resultaten" title="Uitleg overzicht en versturen" description="Informatie over versturen" current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Uitleg overzicht en versturen</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
        magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat.</p>
    <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
        sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <ol>
        <li>Duis aute irure dolor in reprehenderit in</li>
        <li>Voluptate velit esse cillum dolore eu fugiat nulla pariatur.</li>
        <li>Excepteur sint occaecat cupidatat non proident</li>
        <li>sunt in culpa qui officia</li>
        <li>eserunt mollit anim id est laborum.</li>
    </ol>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="{{ route('module-level', $categoryCount) }}" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="{{ route('results') }}" class="btn btn-primary">Volgende<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
</x-progress-step>
