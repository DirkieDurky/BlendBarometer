<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection
    <main class="container">
        <section class="intro min-vh-100">
            <div class="d-flex align-items-center justify-content-between py-5">
                <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer"/>
                <button class="btn btn-outline-secondary btn-sm font-dyslexia"
                        onclick="document.body.classList.toggle('font-dyslexia');">
                    <i class="bi bi-type me-2"></i>
                    <span>Dyslexie modus</span>
                </button>
            </div>
            <div class="description w-50">
                {!! str_replace('&nbsp;', ' ', $intro_description) !!}
            </div>
            <a href="{{ $continueRoute }}" class="btn btn-primary me-2 mt-3">
                {{ $buttonLabel }}
            </a>
        </section>
    </main>
</x-layout>
<script>
    document.addEventListener("keydown", (e) => {
        if (e.key === "Enter") {
            const submitButton = document.querySelector('#continue-button');

            if (submitButton) {
                submitButton.click();
            }
        }
    })
</script>
