<x-progress-step section="Moduleniveau" 
                 title="Vragen op moduleniveau" 
                 description="" 
                 current_step_name="moduleLevel">
                 
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/module-level.css') }}">
    @endsection

    <div class="mb-3">
        <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-success" style="width: {{ 100 * ($currentStep / $totalSteps) }}%"
                aria-valuenow="{{ $currentStep }}" aria-valuemin="0" aria-valuemax="{{ $totalSteps }}"
                role="progressbar"></div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="fs-2 fw-bold text-muted mb-1">{{ $currentStep }} van {{ $totalSteps }}
                - {{ $category->name }}</p>
            <h1 class="fs-3 fw-bold mb-1">{{ $category->name }}</h1>
        </div>
        <button class="btn btn-secondary"onclick="window.location.href='{{ route('intermediate.view', 'moduleniveau') }}'">Hulp nodig?</button>
    </div>

    <hr />

    <form method="POST" action="{{ route('module-level.submit', $currentStep) }}">
        @csrf
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="module-level-form mb-5">
                <div class="row flex-nowrap gap-4 mx-0" role="group">
                    <div class="col-4"></div>
                    <div class="col d-flex flex-row gap-2">
                        <p class="fw-semibold">Verkennen</p>
                        @if (isset($descriptions['explore']))
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $descriptions['explore'] }}">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                    </div>
                    <div class="col d-flex flex-row gap-2">
                        <p class="fw-semibold">Toepassen</p>
                        @if (isset($descriptions['apply']))
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $descriptions['apply'] }}">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                    </div>
                    <div class="col d-flex flex-row gap-2">
                        <p class="fw-semibold">Duidelijk plan</p>
                        @if (isset($descriptions['plan']))
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $descriptions['plan'] }}">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                    </div>
                    <div class="col d-flex flex-row gap-2">
                        <p class="fw-semibold">Verankerd</p>
                        @if (isset($descriptions['anchored']))
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $descriptions['anchored'] }}">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                    </div>
                </div>

                @foreach ($category->questions as $question)
                    @php
                        $fieldName = 'question_' . $question->id;
                        $selectedAnswer = $answers[$currentStep][$question->id] ?? null;
                        $description = $question->description ?? null;
                    @endphp
                    <x-module-question-component :question="$question" :selectedAnswer="$selectedAnswer"
                        :fieldName="$fieldName" :description="$description" />
                @endforeach
            </div>
        </div>

        <x-navigation-buttons-with-submit :previous="route('module-level.previous', $currentStep)" />
    </form>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        document.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                const submitButton = document.querySelector('button.btn-primary');

                if (submitButton) {
                    submitButton.click();
                }
            }
        })
    </script>
</x-progress-step>