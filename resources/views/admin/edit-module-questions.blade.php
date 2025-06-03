<x-admin.edit-questions.edit-lesson-question-modal />
<x-admin.edit-questions.create-lesson-question-modal />
<x-admin.edit-questions.delete-confirmation />

<x-admin.edit-questions.module-sidebar
    :lessonCategories="$lessonCategories"
    :lessonQuestions="$lessonQuestions"
    :formSections="$formSections"
>

<h1 class="mb-3">Module niveau</h1>

<div class="container px-0">
    <div class="row g-2 mb-2">
        <div class="col-12 col-md-6">
            <div class="border rounded px-3 py-2 d-flex align-items-center justify-content-between bg-white h-100">
                <span class="fw-bold" style="color: #e53935;">
                    {{ $moduleLevelAnswer->values()->get(0)->answer }}
                    {{-- <i class="bi bi-info-circle" style="font-size: 1rem;"></i> --}}
                </span>
                <button class="btn btn-secondary fw-semibold" style="border-radius: 0.5rem;">Bewerken</button>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="border rounded px-3 py-2 d-flex align-items-center justify-content-between bg-white h-100">
                <span class="fw-bold" style="color: #f9a825;">
                    {{ $moduleLevelAnswer->values()->get(1)->answer }} 
                    {{-- <i class="bi bi-info-circle" style="font-size: 1rem;"></i> --}}
                </span>
                <button class="btn btn-secondary fw-semibold" style="border-radius: 0.5rem;">Bewerken</button>
            </div>
        </div>
    </div>
    <div class="row g-2 mb-2">
        <div class="col-12 col-md-6">
            <div class="border rounded px-3 py-2 d-flex align-items-center justify-content-between bg-white h-100">
                <span class="fw-bold" style="color: #fbc02d;">
                    {{ $moduleLevelAnswer->values()->get(2)->answer }}
                    {{-- <i class="bi bi-info-circle" style="font-size: 1rem;"></i> --}}
                </span>
                <button class="btn btn-secondary fw-semibold" style="border-radius: 0.5rem;">Bewerken</button>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div class="border rounded px-3 py-2 d-flex align-items-center justify-content-between bg-white h-100">
                <span class="fw-bold" style="color: #43a047;">
                    {{ $moduleLevelAnswer->values()->get(3)->answer }}
                    {{-- <i class="bi bi-info-circle" style="font-size: 1rem;"></i> --}}
                </span>
                <button class="btn btn-secondary fw-semibold" style="border-radius: 0.5rem;">Bewerken</button>
            </div>
        </div>
    </div>
</div>
@foreach ($lessonCategories as $cat)
    <section id="category-{{ $cat->id }}">
        <h4 class="mt-4">{{ $cat->name }}</h4>
        @php
            $questions = $lessonQuestions->where('question_category_id', $cat->id);
        @endphp
        @forelse ($questions as $question)
            <div class="d-flex align-items-center justify-content-between border rounded px-3 py-2 mb-2 bg-white">
                <div>
                    @if($question->label)
                        
                        <div style="font-size: 0.9rem;">
                            {{ $question->label }}
                        </div>
                    @endif
                
                    <div class="fw-semibold">
                        {{ $question->text }}
                        @if ($question->description)
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $question->description }}" style="cursor: pointer;">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                    </div>
                </div>  
                <div class="d-flex align-items-center">
                    <a href="{{ route('admin.edit-module-questions') }}" class="btn btn-primary btn-sm me-3" style="padding: 0.4rem 1.1rem;"
                    data-bs-toggle="modal"
                    data-bs-target="#editQuestionModal"
                    data-question-id="{{ $question->id }}"
                    data-question="{{ $question->text }}"
                    data-label="{{ $question->label }}"
                    data-has-label="1"
                    data-description="{{ $question->description }}"
                    data-action='/admin/vragen-bewerken/moduleniveau/{{ $question->id }}/update'
                    >Bewerken</a>
                    <div class="position-relative">
                        <button class="btn btn-sm btn-link text-dark p-0 toggle-delete-menu text-decoration-none" type="button">
                            <span style="font-size: 1.5rem;">&#8226;&#8226;&#8226;</span>
                        </button>

                        <div class="delete-menu position-absolute end-0 mt-2 p-2 bg-white shadow rounded d-none" style="z-index: 1000;">
                            <a href="{{ route('admin.edit-module-questions') }}" class="btn btn-danger" style="border-radius: 0.5rem; padding: 0.4rem 1.1rem;"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteConfirmationModal"
                            data-action="/admin/vragen-bewerken/moduleniveau/{{ $question->id }}/verwijder"
                            >Verwijder</a>
                        </div>
                    </div>                        
                </div>
            </div>
        @empty
            <p class="text-muted fst-italic">Nog geen vragen toegevoegd</p>
        @endforelse

        <div class="mt-2">
            <a href="{{ route('admin.edit-module-questions') }}" class="btn btn-sm btn-outline-primary border-2" style="padding: 0.4rem 1.1rem;"
            data-bs-toggle="modal"
            data-bs-target="#createQuestionModal"
            data-category-id="{{ $cat->id }}"
            >Vraag toevoegen</a>
        </div>
    </section>
@endforeach
<script>
    document.querySelectorAll('.toggle-delete-menu').forEach(btn => {
        btn.addEventListener('click', function (e) {
            const menu = this.nextElementSibling;
            document.querySelectorAll('.delete-menu').forEach(m => {
                if (m !== menu) m.classList.add('d-none');
            });
            menu.classList.toggle('d-none');
            e.stopPropagation();
        });
    });

    // Hide on click outside
    document.addEventListener('click', function () {
        document.querySelectorAll('.delete-menu').forEach(menu => menu.classList.add('d-none'));
    });
</script>


</x-admin.edit-questions.sidebar>   