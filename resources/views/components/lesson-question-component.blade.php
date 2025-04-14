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