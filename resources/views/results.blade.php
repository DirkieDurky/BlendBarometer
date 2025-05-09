<x-progress-step section="Resultaten" title="Resultaten" description="Het resultaat van de ingevulde vragen." current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Resultaten</h1>
    <p>
        Hier is het resultaat van de ingevulde vragen. Grafieken die in één oogopslag duidelijk maken hoe "blended"
        de module is.
    </p>
    <div class="card graph-card p-3">
        <canvas id="lessonLevel" class="bg-white rounded mb-2"></canvas>
        <strong>Lesniveau - Algemeen</strong>
        <p class="mb-0">Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1:
            Lesniveau in het algemeen</p>
    </div>
    <hr class="my-5" />
    <div class="d-flex flex-row gap-3">
        <div class="d-flex flex-column gap-3">
            <h2>Fysieke leeractiviteiten</h2>
            <canvas id="collaboration" class="bg-white rounded mb-2"></canvas>
            <strong>Samenwerken</strong>
            <p class="mb-0">Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.</p>
        </div>
        <div class="d-flex flex-column gap-3">
            <h2>Online leeractiviteiten</h2>
            <canvas id="collaboration" class="bg-white rounded mb-2"></canvas>
            <strong>Samenwerken</strong>
            <p class="mb-0">Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod teincididunt ut labore et dolore magna aliqua.</p>
        </div>
    </div>
    <x-navigation-buttons :previous="route('overview-and-results-info')" :next="route('overview-and-send')" />
    <script>
        const lessonLevelSubcategories = {!! json_encode($lessonLevelSubcategories) !!};

        const lessonLevelPhysicalQuestions = {!! json_encode($lessonLevelPhysicalQuestions) !!};
        const lessonLevelOnlineQuestions = {!! json_encode($lessonLevelOnlineQuestions) !!};

        const moduleLevelCategories = {!! json_encode($moduleLevelCategories) !!};

        const lessonLevelDataOnline = {!! json_encode($lessonLevelDataOnline) !!};
        const lessonLevelDataPhysical = {!! json_encode($lessonLevelDataPhysical) !!};
        const moduleLevelData = {!! json_encode(session()->get('moduleLevelData')) !!};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src={{ URL::asset('js/results-graphs.js') }}></script>
</x-progress-step>
