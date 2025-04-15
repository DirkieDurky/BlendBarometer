<div class="mb-3">
    <p class="fw-semibold">{{ $question->text }}
        @if ($description)
            <span data-bs-toggle="tooltip" data-bs-title="{{ $description }}" style="cursor: pointer;">
                <i class="bi bi-info-circle-fill"></i>
            </span>
        @endif
    </p>
    <div class="btn-group w-100" role="group">
        <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_nooit" value="0" autocomplete="off" {{ $selectedAnswer === '0' ? 'checked' : '' }} required>
        <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_nooit">
            <div style="font-size: 2rem;">🫢</div>
            <div class="mt-2 text-nowrap">Nooit</div>
        </label>

        <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_af_en_toe" value="1" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_af_en_toe">
            <div style="font-size: 2rem;">🙂</div>
            <div class="mt-2 text-nowrap">Af en toe</div>
        </label>

        <input type="radio" class="btn-check" name="{{ $fieldName }}" id="{{ $fieldName }}_vaak" value="2" autocomplete="off" {{ $selectedAnswer === '2' ? 'checked' : '' }} required>
        <label class="btn btn-outline-secondary d-flex flex-column align-items-center justify-content-center p-3" for="{{ $fieldName }}_vaak">
            <div style="font-size: 2rem;">😃</div>
            <div class="mt-2 text-nowrap">Vaak</div>
        </label>
    </div>
</div>
