<x-progress-step section="Module niveau" title="Vragen op module niveau" description="" current_step_name="moduleLevel">
    <div class="container mt-5">
        <div class="progress rounded-pill">
            <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: {{ ($categoryNr / $categoryCount) * 100 }}%" aria-valuenow="{{ $categoryNr }}" aria-valuemin="0" aria-valuemax="{{ $categoryCount }}">
                {{ $categoryNr }} van {{ $categoryCount }}
            </div>
        </div>
        <p class="mt-2">{{ $categoryNr }} van {{ $categoryCount }} - {{ $category->description }}</p>

        <form action="{{ route('module-level.submit', $categoryNr) }}" method="post">
            @csrf

            <h1>{{ $category->name }}</h1>

            @for ($i = 0; $i < count($category->questions); $i++)
                <x-module-question :question="$category->questions[$i]['text']" :questionId="$i" :answer="$answers[$categoryNr][$i] ?? null" :description="$category->questions[$i]->description" />
            @endfor

            <x-navigation-buttons-with-submit :previous="route('module-level.previous', $categoryNr)" />
        </form>
    </div>
    </div>
</x-progress-step>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
