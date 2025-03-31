<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/home.css') }}">
    @endsection
    <main class="container mt-5">
        <section class="intro">
            <div class="d-flex align-items-center mb-5">
                <img src="public/BlendBarometer-logo.svg" alt="BlendBarometer" class="me-2">
                <strong>BlendBarometer</strong>
            </div>

            <h1 class="fw-bold mb-4">
                Een <span class="text-primary">meetinstrument</span> om <br>
                de kwaliteit van een <br>
                <span class="text-primary">Blended module</span> te meten
            </h1>
            <p class="w-50 mb-4">
                De Blend Barometer is een meetinstrument om de kwaliteit van de Blended module te meten. 
                Hiermee is inzichtelijk wat de huidige status is en wat er nog nodig is 
                om uiteindelijk tot een kwalitatieve en harmonieuze mix van leeractiviteiten te komen.
            </p>
            @php
                session(['data' => 'cool data']) 
            @endphp
            <form action="#" class="d-flex">
                @if (!session()->has('data')) <!-- temporary -->
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
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
                magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex.
            </p>
            <div class="d-flex">
                <img src="" alt="1" class="me-3">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 1: Les niveau</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <img src="" alt="2" class="me-3">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 2: Module niveau</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <img src="" alt="3" class="me-3">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 3: Inhoudsrijk gesprek</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
            <div class="d-flex">
                <img src="" alt="4" class="me-3">
                <div class="d-flex flex-column">
                    <h5 class="fw-bold">Deel 4: Advies rapportage</h5>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                        Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
                        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                    </p>
                </div>
            </div>
        </section>
    </main>

</x-layout>
