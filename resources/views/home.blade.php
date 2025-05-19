<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection

    <main class="container">
        <section class="intro min-vh-100">
            <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer" class="my-5" />
            <h1 class="fw-bold mb-4 w-50">
                Een <span class="text-primary">meetinstrument</span> om
                de kwaliteit van een
                <span class="text-primary">Blended module</span> te meten
            </h1>
            <p class="w-50 mb-4">
                {{ $intro_description }}
            </p>
            <a href="{{ $continueRoute }}" id="continue-button" class="btn btn-primary me-2">
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
