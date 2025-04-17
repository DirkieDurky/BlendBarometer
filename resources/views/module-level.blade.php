<x-progress-step section="Module niveau"
                 title="Vragen op module niveau"
                 description=""
                 current_step_name="moduleLevel">

    <div class="mb-3">
        <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-success"
                 style="width: {{ 100 * ($categoryNr / $categoryCount) }}%"
                 aria-valuenow="{{ $categoryNr }}"
                 aria-valuemin="0"
                 aria-valuemax="{{ $categoryCount }}"
                 role="progressbar"></div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="fs-5 fw-bold text-muted mb-1">{{ $categoryNr }} van {{ $categoryCount }}
                - {{ $category->description }}</p>
            <h1 class="fs-3 fw-bold mb-1">{{ $category->name }}</h1>
        </div>
        {{-- <button class="btn btn-secondary">Hulp nodig?</button> // TODO: redirect to 'tussenpagina' --}}
    </div>

    <form action="{{ route('module-level.submit', $categoryNr) }}" method="post">
        @csrf

        @for ($i = 0; $i < count($category->questions); $i++)
            <x-module-question :question="$category->questions[$i]['text']" :questionId="$i"
                               :answer="$answers[$categoryNr][$i] ?? null"
                               :description="$category->questions[$i]->description"/>
        @endfor

        <x-navigation-buttons-with-submit :previous="route('module-level.previous', $categoryNr)"/>
    </form>
</x-progress-step>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
