<x-progress-step>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <h1>Resultaten</h1>
    <p>
        Hier is het resultaat van de ingevulde vragen. Grafieken die in één oogopslag duidelijk maken hoe "blended"
        de
        module is.
    </p>
    <div class="container-fluid">
        <div class="row g-3 mt-3">
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="partOnePhysical" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Fysiek</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau op fysiek gebied</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="partOneOnline" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Online</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau op online gebied</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="partOne" class="bg-white rounded mb-2"></canvas>
                    <strong>Lesniveau - Algemeen</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 1: Lesniveau in het algemeen</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="partTwo" class="bg-white rounded mb-2"></canvas>
                    <strong>Moduleniveau</strong>
                    <p>Deze grafiek geeft een overzicht van de hoeveelheid punten gescoord voor Deel 2: Moduleniveau</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="uitleg-overzicht-en-resultaten" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="overzicht-en-versturen" class="btn btn-primary">Afronden<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
    <script>
        sessionStorage.setItem("partOneDataPhysical", JSON.stringify([12, 19, 3, 5, 2, 3]));
        sessionStorage.setItem("partOneDataOnline", JSON.stringify([7, 15, 2, 0, 9, 3]));
        sessionStorage.setItem("partTwoData", JSON.stringify([7, 15, 2]));
    </script>
    <script src={{ URL::asset('js/results-graphs.js') }}></script>
</x-progress-step>
