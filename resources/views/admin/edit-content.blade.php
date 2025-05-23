<x-admin.layout>
    <div class="container">
        <h1>Content bewerken</h1>
        <p>
            Bewerk de content van de pagina’s. Navigeer met de tabjes en vergeet niet om op opslaan te klikken, onderaan
            de pagina.
        </p>

        <ul class="nav nav-underline tablist rounded shadow-sm" id="tabList" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-selected="true">
                    Home pagina
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#explanation-tab-pane"
                        type="button" role="tab" aria-selected="true">
                    Uitleg pagina
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tp1-tab-pane"
                        type="button" role="tab" aria-selected="false">
                    Tussenpagina deel 1
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tp2-tab-pane"
                        type="button" role="tab" aria-selected="false">
                    Tussenpagina deel 2
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tp3-tab-pane"
                        type="button" role="tab" aria-selected="false">
                    Tussenpagina deel 3
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#chart-tab-pane"
                        type="button" role="tab" aria-selected="false">
                    Grafieken
                </button>
            </li>
        </ul>

        <div class="tab-content mt-4" id="tabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                 tabindex="-1">
                <x-admin.edit-content.home :home="$home"/>
            </div>
            <div class="tab-pane fade" id="explanation-tab-pane" role="tabpanel" aria-labelledby="uitleg-tab"
                 tabindex="-1">
                <x-admin.edit-content.explanation/>
            </div>
            <div class="tab-pane fade" id="tp1-tab-pane" role="tabpanel" aria-labelledby="tussenpagina 1-tab"
                 tabindex="-1">
                <x-admin.edit-content.intermediate/>
            </div>
            <div class="tab-pane fade" id="tp2-tab-pane" role="tabpanel" aria-labelledby="tussenpagina 2-tab"
                 tabindex="-1">
                <x-admin.edit-content.intermediate/>
            </div>
            <div class="tab-pane fade" id="tp3-tab-pane" role="tabpanel" aria-labelledby="tussenpagina 3-tab"
                 tabindex="-1">
                <x-admin.edit-content.intermediate/>
            </div>
            <div class="tab-pane fade" id="chart-tab-pane" role="tabpanel" aria-labelledby="grafieken-tab"
                 tabindex="-1">
                <x-admin.edit-content.chart/>
            </div>
        </div>
    </div>
</x-admin.layout>
