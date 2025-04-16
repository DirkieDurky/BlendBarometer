<div class="mb-5">
    <p class="fw-semibold">{{ $question->text }}
        @if ($description)
            <span data-bs-toggle="tooltip" data-bs-title="{{ $description }}" style="cursor: pointer;">
                <i class="bi bi-info-circle-fill"></i>
            </span>
        @endif
    </p>
    <div class="d-flex gap-4" role="group">
        <input type="radio" class="form-check-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_nooit" value="0" autocomplete="off" {{ $selectedAnswer === '0' ? 'checked' : '' }} required>
        <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_nooit">
            <span style="font-size: 2rem;">🫢</span>
            <span class="mt-2 text-nowrap">Nooit</span>
        </label>

        <input type="radio" class="form-check-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_af_en_toe" value="1" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_af_en_toe">
            <span style="font-size: 2rem;">🙂</span>
            <span class="mt-2 text-nowrap">Af en toe</span>
        </label>

        <input type="radio" class="form-check-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_vaak" value="2" autocomplete="off" {{ $selectedAnswer === '2' ? 'checked' : '' }} required>
        <label class="form-check-label border-2 border rounded shadow-sm flex-fill py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_vaak">
            <span style="font-size: 2rem;">😃</span>
            <span class="mt-2 text-nowrap">Vaak</span>
        </label>
    </div>
</div>
