<x-progress-step section="Les niveau" title="Vragen op les niveau" description="" current_step_name="lessonLevel">
    <div class="mb-3">
        <div class="progress" style="height: 6px;">
            <div class="progress-bar bg-success" style="width: {{ 100 * ($currentStep / $totalSteps) }}%"></div>
        </div>
    </div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="text-muted mb-1">{{ $subCategory->id }} van {{ $totalSteps }}
                - {{ $subCategory->QuestionCategory->name }}</h5>
            <h3 class="fw-bold mb-1">{{ $subCategory->name }}</h3>
            <p class="text-muted">Hoe vaak gebruik je ...</p>
        </div>
        {{-- <button class="btn btn-secondary">Hulp nodig?</button> // TODO: redirect to 'tussenpagina' --}}
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
                        $questionText = str_replace('custom_question_', '', $key);
                    @endphp
                    <x-lesson-question-component
                        :question="(object) ['id' => $key, 'text' => $questionText]"
                        :selectedAnswer="$selectedAnswer"
                        :fieldName="$fieldName"/>
                @endforeach
            @endif
        </div>

        <div class="mb-5">
            <label class="form-label"><strong>Gebruik je iets in de categorie {{ $subCategory->name }}, wat niet voorbij
                    gekomen is?</strong></label>
            <div class="input-group">
                <input type="text" class="form-control" id="custom_input" name="custom_input"
                       placeholder="Vul je vraag in">
                <button class="btn btn-primary" type="button" id="addCustomQuestionBtn">Toevoegen</button>
            </div>
        </div>

        <x-navigation-buttons-with-submit :previous="route('lesson-level.previous', $currentStep)"/>
    </form>
    <script src="{{ asset('js/customQuestion.js') }}"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script src="https://unpkg.com/twemoji@latest/dist/twemoji.min.js" crossorigin="anonymous"></script>
</x-progress-step>
