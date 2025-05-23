<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection
    <main class="container">
        <section class="intro min-vh-100">
            <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer" class="my-5" />
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
