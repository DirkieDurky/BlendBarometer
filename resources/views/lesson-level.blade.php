<x-layout>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <x-step-sidebar :title="'Les niveau'" :smallDescription="'Welke les methodes gebruik je?'" :current_step_name="'Les niveau'"></x-step-sidebar>
            </div>
            <div class="col-md-9">
                <div class="mb-3">
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: {{ 100 * ($currentStep / $totalSteps) }}%"></div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="text-muted mb-1">{{ $subCategory->id }} van {{ $totalSteps }} - {{ $subCategory->QuestionCategory->name }}</h5>
                        <h3 class="fw-bold mb-1">{{ $subCategory->name }}</h3>
                        <p class="text-muted">Hoe vaak gebruik je ...</p>
                    </div>
                    {{-- <button class="btn btn-secondary btn-sm">Hulp nodig?</button> verwijst naar tussenpagina --}}
                </div>

                <form method="POST" action="{{ route('lesson-level.storeAnswers', $currentStep) }}">
                    @csrf

                    @foreach ($questions as $question)
                        @php
                            $fieldName = 'question_' . $question->id;
                            $selectedAnswer = $answers[$currentStep][$question->id] ?? null;
                        @endphp
                        <x-lesson-question-component :question="$question" :selectedAnswer="$selectedAnswer" :fieldName="$fieldName" />
                    @endforeach

                    <div class="mb-3">
                        <label class="form-label"><strong>Gebruik je iets in de categorie {{ $subCategory->name }}, wat niet voorbij gekomen is?</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control" id="custom_collab" name="custom_collab" placeholder="Vul je vraag in">
                            <button class="btn btn-primary" type="button" id="addCustomQuestionBtn">Toevoegen</button>
                        </div>
                    </div>

                    @if (!empty($customQuestions))
                        @foreach ($customQuestions as $key => $customQuestion)
                            @php
                                $fieldName = $key;
                                $selectedAnswer = $answers[$currentStep][$key] ?? null;
                                $questionText = str_replace('custom_', '', $key);
                            @endphp
                            <x-lesson-question-component :question="(object) ['id' => $key, 'text' => $questionText]" :selectedAnswer="$selectedAnswer" :fieldName="$fieldName" />
                        @endforeach
                    @endif
                    <div class="d-flex justify-content-between">
                        @if ($currentStep > 1)
                            <a href="{{ route('lesson-level.back', $currentStep) }}" class="btn btn-outline-secondary"><i class="bi bi-arrow-left"> Vorige</a>
                        @else
                            <div></div>
                        @endif
                        <button type="submit" class="btn btn-primary">Volgende <i class="bi bi-arrow-right"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/customQuestion.js') }}"></script>
</x-layout>
