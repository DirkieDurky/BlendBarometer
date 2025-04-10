<x-layout>
    <div class="container mt-5">

        <div class="progress rounded-pill">
            <div class="progress-bar bg-success rounded-pill" role="progressbar"
                style="width: {{ ($category->id / $maxCategoryId) * 100 }}%" aria-valuenow="{{ $category->id }}"
                aria-valuemin="0" aria-valuemax="{{ $maxCategoryId }}">
                {{ $category->id }} van {{ $maxCategoryId }}
            </div>
        </div>
        <p class="mt-2">{{ $category->id }} van {{ $maxCategoryId }} - {{ $category->description }}</p>

        <form action="/deel2/{{ $category->id }}/navigate" method="post">
            @csrf

            <h1>{{ $category->name }}</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @for ($i = 0; $i < count($category->questions); $i++)
                <x-moduleQuestion :question="$category->questions[$i]['text']" :questionId="$i"
                    :answer="$answers[$category->id][$i] ?? null" :description="$category->questions[$i]->description" />
            @endfor

            <div class="mt-3 d-flex">
                <button name="navigation" value="previous" type="submit" class="btn btn-outline-primary me-2">&larr;
                    Vorige</button>
                <button name="navigation" value="next" type="submit" class="btn btn-primary">Volgende &rarr;</button>
            </div>
        </form>
    </div>
</x-layout>

<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>