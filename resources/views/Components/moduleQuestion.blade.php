<div class="mb-3">
    <p class="fw-semibold">{{ $question }}</p>
    <div class="d-flex gap-3">
        <div class="form-check position-relative">
            <input class="form-check-input visually-hidden" type="radio" name="vraag_{{ $questionId }}" id="little-{{ $questionId }}" value="0" {{ $answer === '0' ? 'checked' : '' }} required>
            <label class="form-check-label d-flex flex-column align-items-center justify-content-center p-3 border rounded border-secondary text-center cursor-pointer" for="little-{{ $questionId }}" style="width: 260px; height: 110px;">
                <span class="d-inline-block rounded-circle bg-danger mb-2" style="width: 42px; height: 42px;"></span>
                <span class="fw-bold">Dit doen we niet tot weinig</span>
            </label>
            <svg class="position-absolute top-0 end-0 m-2 text-success visually-hidden" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <div class="form-check position-relative">
            <input class="form-check-input visually-hidden" type="radio" name="vraag_{{ $questionId }}" id="sometimes-{{ $questionId }}" value="1" {{ $answer === '1' ? 'checked' : '' }} required>
            <label class="form-check-label d-flex flex-column align-items-center justify-content-center p-3 border rounded border-secondary text-center cursor-pointer" for="sometimes-{{ $questionId }}" style="width: 260px; height: 110px;">
                <span class="d-inline-block rounded-circle bg-warning mb-2" style="width: 42px; height: 42px;"></span>
                <span class="fw-bold">Dit doen we een beetje</span>
            </label>
            <svg class="position-absolute top-0 end-0 m-2 text-success visually-hidden" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
        <div class="form-check position-relative">
            <input class="form-check-input visually-hidden" type="radio" name="vraag_{{ $questionId }}" id="often-{{ $questionId }}" value="2" {{ $answer === '2' ? 'checked' : '' }} required>
            <label class="form-check-label d-flex flex-column align-items-center justify-content-center p-3 border rounded border-secondary text-center cursor-pointer" for="often-{{ $questionId }}" style="width: 260px; height: 110px;">
                <span class="d-inline-block rounded-circle bg-success mb-2" style="width: 42px; height: 42px;"></span>
                <span class="fw-bold">Ja dit doen we</span>
            </label>
            <svg class="position-absolute top-0 end-0 m-2 text-success visually-hidden" width="24" height="24" fill="currentColor" viewBox="0 0 16 16">
                <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
            </svg>
        </div>
    </div>
</div>

<style>
.form-check-input:checked + .form-check-label {
    border-color:rgb(12, 209, 117) !important; /* Groene kleur van Bootstrap success */
    border-width: 6px !important; /* Maak de rand 4 pixels breed */
}

.form-check-input:checked + .form-check-label + svg {
    display: block !important; /* Toon het vinkje wanneer de radio button is geselecteerd */
}

.form-check-label {
    border-width: 2px !important; /* Maak de randen van de vakjes standaard 4 pixels breed */
    height: 125px !important; /* Behoud de hoogte */
    width: 260px !important; /* Maak de vakjes breder */
}
</style>