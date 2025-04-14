<x-progress-step section="Resultaten" title="Resultaten" description="Het resultaat van de ingevulde vragen." current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Resultaten</h1>
    <p>
        Hier is het resultaat van de ingevulde vragen. Grafieken die in één oogopslag duidelijk maken hoe "blended"
        de module is.
    </p>
    <div class="container-fluid">
        <div class="row g-3 mt-3">
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="lessonLevelPhysical" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Fysiek</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau op fysiek gebied</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="lessonLevelOnline" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Online</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau op online gebied</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="lessonLevel" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Algemeen</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau in het algemeen</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="moduleLevel" class="bg-white rounded mb-2"></canvas>
                    <strong>Moduleniveau</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 2: Moduleniveau</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="{{ route('overview-and-results-info') }}" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="{{ route('overview-and-send') }}" class="btn btn-primary">Afronden<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
    <script>
        const lessonLevelSubcategories = {!! json_encode($lessonLevelSubcategories) !!};
        const moduleLevelCategories = {!! json_encode($moduleLevelCategories) !!};

        const lessonLevelDataOnline = {!! json_encode($lessonLevelDataOnline) !!};
        const lessonLevelDataPhysical = {!! json_encode($lessonLevelDataPhysical) !!};
        const moduleLevelData = {!! json_encode(session()->get('moduleLevelData')) !!};
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src={{ URL::asset('js/results-graphs.js') }}></script>
</x-progress-step>
