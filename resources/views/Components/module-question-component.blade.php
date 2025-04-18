{{-- <div class="mb-5"> --}}
<div class="row flex-nowrap gap-4 mx-0" role="group">
    <div class="col-4 d-flex flex-row">
        <p class="mb-0 ">{{ $question->text }}
        </p>
        @if ($description)
            <span data-bs-toggle="tooltip" data-bs-title="{{ $description }}" style="cursor: pointer;">
                <i class="bi bi-info-circle-fill"></i>
            </span>
        @endif
    </div>
    <div class="col py-4 d-flex flex-column justify-content-center align-items-center">
        <input type="radio" class="module-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_explore" value="0" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="module-label border-2 border rounded-circle shadow-sm col py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_explore" style="width:50px; height:50px; max-height:50px">
        </label>
    </div>
    <div class="col py-4 d-flex flex-column justify-content-center align-items-center">
        <input type="radio" class="module-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_apply" value="0" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="module-label border-2 border rounded-circle shadow-sm col py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_apply" style="width:50px; height:50px; max-height:50px">
        </label>
    </div>
    <div class="col py-4 d-flex flex-column justify-content-center align-items-center">
        <input type="radio" class="module-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_plan" value="0" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="module-label border-2 border rounded-circle shadow-sm col py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_plan" style="width:50px; height:50px; max-height:50px">
        </label>
    </div>
    <div class="col py-4 d-flex flex-column justify-content-center align-items-center">
        <input type="radio" class="module-input visually-hidden" name="{{ $fieldName }}" id="{{ $fieldName }}_anchored" value="0" autocomplete="off" {{ $selectedAnswer === '1' ? 'checked' : '' }} required>
        <label class="module-label border-2 border rounded-circle shadow-sm col py-4 d-flex flex-column justify-content-center align-items-center" for="{{ $fieldName }}_anchored" style="width:50px; height:50px; max-height:50px">
        </label>
    </div>
</div>
{{-- </div> --}}
