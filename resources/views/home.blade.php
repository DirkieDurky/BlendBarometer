<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection

    <main class="container mt-5">
        <section class="intro">
            <div class="d-flex align-items-center mb-5">
                <img src="{{ asset('images/blendbarometer-logo.svg') }}" alt="BlendBarometer" class="me-2">
                <strong>BlendBarometer</strong>
            </div>

            <h1 class="fw-bold mb-4">
                Een <span class="text-primary">meetinstrument</span> om <br>
                de kwaliteit van een <br>
                <span class="text-primary">Blended module</span> te meten
            </h1>
            <p class="w-50 mb-4">
                {{ $intro_description }}
            </p>
            @php
                session(['progress' => 'step1']) 
            @endphp
            <form action="#" class="d-flex">
                @if (!session()->has('progress')) <!-- temporary -->
                    <button type="submit" class="btn btn-primary me-2">Start met invullen</button>
                @else
                    <button type="submit" class="btn btn-primary me-2">Verder met invullen</button>
                @endif
                <a href="#explanation" class="btn btn-outline-primary">Hoe werkt het?</a>
            </form>
        </section>
        <section>
            <h3 id="explanation" class="fw-bold">Hoe werkt de BlendBarometer?</h2>
            <p>
                {{ $intro_explanation }}
            </p>
            <div class="d-flex align-items-start">
                <img src="{{ asset('images/one.svg') }}" alt="1" class="me-3 step">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 1: Les niveau</h5>
                    <p>
                        {{ $intro_part1 }}
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <img src="{{ asset('images/two.svg') }}" alt="2" class="me-3 step">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 2: Module niveau</h5>
                    <p>
                        {{ $intro_part2 }}
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-start">
                <img src="{{ asset('images/three.svg') }}" alt="3" class="me-3 step">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 3: Inhoudsrijk gesprek</h5>
                    <p>
                        {{ $intro_part3 }}
                    </p>
                </div>
            </div>
            <div class="d-flex align-items-start mb-5">
                <img src="{{ asset('images/four.svg') }}" alt="4" class="me-3 step">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 4: Advies rapportage</h5>
                    <p>
                        {{ $intro_part4 }}
                    </p>
                </div>
            </div>
        </section>
    </main>
</x-layout>
