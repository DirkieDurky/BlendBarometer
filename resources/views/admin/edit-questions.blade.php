<x-admin.edit-questions.sidebar
    :lessonCategories="$lessonCategories"
    :lessonSubCategories="$lessonSubCategories"
    :lessonQuestions="$lessonQuestions"
>


<h1 class="mb-3">Les niveau</h1>

@foreach ($lessonCategories as $cat)
    <section id="category-{{ $cat->id }}">
        <h2>{{ $cat->description }}</h2>

        @foreach ($lessonSubCategories->where('question_category_id', $cat->id) as $subCat)
            <section id="subcategory-{{ $subCat->id }}" class="mt-4">
                <h4>{{ $subCat->name }}</h4>

                @php
                    $questions = $lessonQuestions->where('sub_category_id', $subCat->id);
                @endphp

                @forelse ($questions as $question)
                    <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2 mb-2 bg-white">
                        <div class="fw-semibold">
                            {{ $question->text }}
                            @if ($question->description)
                                <span data-bs-toggle="tooltip" data-bs-title="{{ $question->description }}" style="cursor: pointer;">
                                    <i class="bi bi-info-circle-fill"></i>
                                </span>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('admin.edit-questions') }}" class="btn btn-primary btn-sm me-3" style="padding: 0.4rem 1.1rem;">Bewerken</a>
                            <span style="font-size: 1.5rem; cursor: pointer;">&#8226;&#8226;&#8226;</span>
                        </div>
                    </div>
                @empty
                    <p class="text-muted fst-italic">Nog geen vragen toegevoegd</p>
                @endforelse

                <div class="mt-2">
                    <a href="#" class="btn btn-sm btn-outline-primary border-2" style="padding: 0.4rem 1.1rem;">Vraag toevoegen</a>
                </div>
            </section>
        @endforeach
    </section>
@endforeach

</x-admin.edit-questions.sidebar>   