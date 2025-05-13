<x-progress-step section="Les niveau" 
                 title="Vragen op les niveau" 
                 description="" 
                 current_step_name="lessonLevel">
                 
    <div class="mb-3">
        <div class="progress" style="height: 10px;">
            <div class="progress-bar bg-success"
                 style="width: {{ 100 * ($currentStep / $totalSteps) }}%"
                 aria-valuenow="{{ $currentStep }}"
                 aria-valuemin="0"
                 aria-valuemax="{{ $totalSteps }}"
                 role="progressbar"></div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <p class="fs-2 fw-bold text-muted mb-1">{{ $subCategory->id }} van {{ $totalSteps }}
                - {{ $subCategory->QuestionCategory->name }}</p>
            <h1 class="fs-3 fw-bold mb-1">{{ $subCategory->name }}</h1>
            <p class="text-muted">Hoe vaak gebruik je ...</p>
        </div>
        <button class="btn btn-secondary" onclick="window.location.href='{{ route('intermediate.view', 'lesniveau') }}'">Hulp nodig?</button>
    </div>

    <form method="POST" action="{{ route('lesson-level.submit', $currentStep) }}">
        @csrf

        @foreach ($questions as $question)
            @php
                $fieldName = 'question_' . $question->id;
                $selectedAnswer = $answers[$currentStep][$question->id] ?? null;
                $description = $question->description ?? null;
            @endphp
            <x-lesson-question-component
                :question="$question"
                :selectedAnswer="$selectedAnswer"
                :fieldName="$fieldName"
                :description="$description"/>
        @endforeach

        <div id="custom-question-container">
            @if (!empty($customQuestions))
                @foreach ($customQuestions as $key => $customQuestion)
                    @php
                        $fieldName = $key;
                        $selectedAnswer = $answers[$currentStep][$key] ?? null;
                        $questionText = ucfirst(str_replace('_', ' ', preg_replace('/_\\d+$/', '', str_replace('custom_question_', '', $key))));
                    @endphp
                    <x-lesson-question-component
                        :question="(object) ['id' => $key, 'text' => $questionText]"
                        :selectedAnswer="$selectedAnswer"
                        :fieldName="$fieldName"/>
                @endforeach
            @endif
        </div>

        <div class="mb-5">
            <label class="form-label">
                <strong>
                    Gebruik je een leeractiviteit die hier niet genoemd is?
                </strong>
            </label>
            <div class="input-group" style="width: fit-content">
                <input type="text" class="form-control" id="custom_input" name="custom_input"
                       placeholder="Vul de leeractiviteit in">
                <button class="btn btn-primary" type="button" id="addCustomQuestionBtn">Toevoegen</button>
            </div>
        </div>

        <x-navigation-buttons-with-submit :previous="route('lesson-level.previous', $currentStep)"/>
    </form>
    <script src="{{ asset('js/custom-question.js') }}"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="https://unpkg.com/twemoji@latest/dist/twemoji.min.js" crossorigin="anonymous"></script>
</x-progress-step>
