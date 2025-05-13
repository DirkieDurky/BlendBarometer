<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection

    <main class="container">
        <section class="intro min-vh-100">
            <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer" class="my-5"/>
            <h1 class="fw-bold mb-4">
                Een <span class="text-primary">meetinstrument</span> om <br>
                de kwaliteit van een <br>
                <span class="text-primary">Blended module</span> te meten
            </h1>
            <p class="w-50 mb-4">
                {{ $intro_description }}
            </p>
            <a href="{{ $continueRoute }}" class="btn btn-primary me-2">
                {{ $buttonLabel }}
            </a>
        </section>
    </main>
</x-layout>
