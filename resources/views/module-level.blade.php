<x-progress-step section="Module niveau" title="Vragen op module niveau" description="" current_step_name="moduleLevel">
    <div class="container mt-5">
        <div class="progress rounded-pill">
            <div class="progress-bar bg-success rounded-pill" role="progressbar" style="width: {{ ($category->id / $maxCategoryId) * 100 }}%" aria-valuenow="{{ $category->id }}" aria-valuemin="0" aria-valuemax="{{ $maxCategoryId }}">
                {{ $category->id }} van {{ $maxCategoryId }}
            </div>
        </div>
        <p class="mt-2">{{ $category->id }} van {{ $maxCategoryId }} - {{ $category->description }}</p>

        <form action="/module-level/{{ $category->id }}/navigate" method="post">
            @csrf

            <h1>{{ $category->name }}</h1>

            @for ($i = 0; $i < count($category->questions); $i++)
                <x-module-question :question="$category->questions[$i]['text']" :questionId="$i" :answer="$answers[$category->id][$i] ?? null" :description="$category->questions[$i]->description" />
            @endfor

            <br>

            <div class="mt-3 d-flex justify-content-end">
                <button name="navigation" value="previous" type="submit" class="btn btn-outline-primary me-2">
                    <i class="bi bi-arrow-left"></i> Vorige
                </button>
                <button name="navigation" value="next" type="submit" class="btn btn-primary">
                    Volgende <i class="bi bi-arrow-right"></i>
                </button>
            </div>
        </form>
    </div>
    </div>
</x-progress-step>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
