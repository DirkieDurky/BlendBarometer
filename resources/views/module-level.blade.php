<x-progress-step section="Moduleniveau" title="Vragen op moduleniveau" description="" current_step_name="moduleLevel">

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
            <h1 class="fs-2 fw-bold text-muted mb-1">{{ $currentStep }} van {{ $totalSteps }}
                - {{ $category->name }}</h1>
            <h2 class="fs-3 fw-bold mb-1">{{ $category->name }}</h2>
        </div>
        <button class="btn btn-secondary"
                onclick="window.location.href='{{ route('intermediate.view', 'moduleniveau') }}'">Hulp nodig?
        </button>
    </div>

    <hr/>

    <form method="POST" action="{{ route('module-level.submit', $currentStep) }}">
        @csrf
        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="module-level-form mb-5">
                <div class="row flex-nowrap gap-4 mx-0" role="group">
                    <div class="col-4"></div>
                    @foreach ($moduleAnswers as $answer)
                        <div class="col d-flex flex-row gap-2">
                        <p class="fw-semibold">{{$answer->answer}}</p>
                        @if (isset($answer->description))
                            <span data-bs-toggle="tooltip" data-bs-title="{{ $answer->description }}">
                                <i class="bi bi-info-circle-fill"></i>
                            </span>
                        @endif
                        </div>
                    @endforeach
                </div>

                @foreach ($category->questions as $question)
                    @php
                        $fieldName = 'question_' . $question->id;
                        $selectedAnswer = $answers[$currentStep][$question->id] ?? null;
                        $description = $question->description ?? null;
                    @endphp
                    <x-module-question-component :question="$question" :selectedAnswer="$selectedAnswer"
                                                 :fieldName="$fieldName" :description="$description"/>
                @endforeach
            </div>
        </div>

        <x-navigation-buttons-with-submit :previous="$previous ?? route('module-level.previous', $currentStep)"/>
    </form>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

        document.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                form = document.querySelector('form');

                if (form.reportValidity()) {
                    form.submit();
                }
            }
        })
    </script>
</x-progress-step>
