<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <div class="mb-3">
                    <div class="progress" style="height: 6px;">
                        <div class="progress-bar bg-success" style="width: {{ 100 * ($currentStep / $totalSteps) }}%"></div>
                    </div>
                </div>
            
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h5 class="text-muted mb-1">{{ $subCategory->id }} van {{ $totalSteps }} - {{ $subCategory->QuestionCategory->description }}</h5> {{-- moet via db --}}
                        <h3  class="fw-bold mb-1">{{ $subCategory->name }}</h3>
                        <p class="text-muted">Hoe vaak gebruik je ...</p>
                    </div>
                    <button class="btn btn-secondary btn-sm">Hulp nodig?</button> {{-- verwijst naar tussenpagina--}}
                </div>

               
                <form method="POST" action="{{ route('deel1.storeAnswers', $currentStep) }}">
                    @csrf
            
                    @foreach($questions as $question)
                        @php
                            $fieldName = "question_" . $question->id;
                            $selectedAnswer = $answers[$currentStep][$question->id] ?? null;
                        @endphp
                        <div class="mb-3">
                            <label class="form-label fw-bold">{{ $question->text }}</label>
                            <div class="btn-group w-100" role="group">
                                <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_nooit" value="Nooit" autocomplete="off" {{ $selectedAnswer === 'Nooit' ? 'checked' : '' }} required>    
                                <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_nooit">
                                    <div style="font-size: 2rem;">😞</div>
                                    <div class="mt-2 text-nowrap">Nooit</div>
                                </label>
                                
                                <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_af_en_toe" value="Af en toe" autocomplete="off" {{ $selectedAnswer === 'Af en toe' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_af_en_toe">
                                    <div style="font-size: 2rem;">😐</div>
                                    <div class="mt-2 text-nowrap">Af en toe</div>
                                </label>

                                <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_vaak" value="Vaak" autocomplete="off" {{ $selectedAnswer === 'Vaak' ? 'checked' : '' }} required>
                                <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_vaak">
                                    <div style="font-size: 2rem;">😊</div>
                                    <div class="mt-2 text-nowrap">Vaak</div>
                                </label>
                            </div>
                        </div>
                    @endforeach
            
                    <div class="mb-3">
                        <label class="form-label"><strong>Gebruik je iets in de categorie {{ $subCategory->questionCategory->description }}, wat niet voorbij gekomen is?</strong></label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="custom_collab">
                            <button class="btn btn-primary" type="button">Toevoegen</button> {{-- moet werkend gemaakt worden --}}
                        </div>
                    </div>
            </div>
            
                <div class="d-flex justify-content-between">
                    @if($currentStep > 1)
                        <a href="{{ route('deel1.back', $currentStep) }}" class="btn btn-outline-secondary">← Vorige</a>
                    @else
                        <div></div>
                    @endif

                    @if($currentStep < $totalSteps)
                        <button type="submit" class="btn btn-primary">Volgende →</button>
                    @else
                        <a href="{{ route('deel2.start') }}" class="btn btn-success">Volgende →</a>
                    @endif
                </div>
                </form>
            
        </div>
    </div>
</x-layout>
