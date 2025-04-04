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
                    <canvas id="global" class="bg-white rounded mb-2"></canvas>
                    <strong>Algemene overzicht</strong>
                    <p>Deze grafiek geeft een algemeen overzicht hoe "blended" deze module is</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalTeamwork" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Samenwerken</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalResearch" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Onderzoeken</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalInformationGathering" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Informatie verwerven</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalDiscussing" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Discussieren</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalTraining" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Oefenen</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
            <div class="col-6 col-xl-4 col-xxl-3">
                <div class="card graph-card">
                    <canvas id="physicalProducing" class="bg-white rounded mb-2"></canvas>
                    <strong>Fysieke leeractiviteiten - Produceren</strong>
                    <p>Lorem ipsum dolor sit amet, consecte adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore magna aliqua.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex flex-row gap-3 justify-content-md-end">
        <a href="uitleg-overzicht-en-resultaten" class="btn back-button"><i class="bi bi-arrow-left pe-2"></i>Vorige</a>
        <a href="overzicht-en-versturen" class="btn btn-primary">Afronden<i class="bi bi-arrow-right ps-2"></i></a>
    </div>
    <script>
        sessionStorage.setItem("globalDataPhysical", JSON.stringify([12, 19, 3, 5, 2, 3]));
        sessionStorage.setItem("globalDataOnline", JSON.stringify([7, 15, 2, 0, 9, 3]));
        sessionStorage.setItem("physicalTeamworkData", JSON.stringify([7, 15, 2, 0, 9]));
        sessionStorage.setItem("physicalResearchData", JSON.stringify([7, 15, 2]));
        sessionStorage.setItem("physicalInformationGatheringData", JSON.stringify([7, 15, 2]));
        sessionStorage.setItem("physicalDiscussingData", JSON.stringify([7, 15, 2, 0]));
        sessionStorage.setItem("physicalTrainingData", JSON.stringify([7, 15, 2, 0]));
        sessionStorage.setItem("physicalProducingData", JSON.stringify([7, 15, 2]));
    </script>
    <script src={{ URL::asset('js/results-graphs.js') }}></script>
</x-progress-step>
