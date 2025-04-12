<x-layout>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar on the left -->
            <div class="col-md-3">
                <x-step-sidebar :title="'Gegevens'" :smallDescription="'Wie vult de barometer in'" :current_step_name="'information'">We willen graag weten wie dit invult en voor welke module het bedoeld is.</x-stepSidebar>
            </div>

            <!-- Main content on the right -->
            <div class="col-md-9 container bg-light-greenish">
                <form method="post" action="/information">
                    <h1 class="pb-2 pt-4 w-90 mx-auto mb-2 mt-5 fs-2 fw-bolder">Gegevens</h1>
                    @csrf <!--DON'T FORGET TO ADD THIS COMMAND TO YOUR FORMS, OTHERWISE IT WILL NOT WORK-->
                    <section class="py-4 w-90 mx-auto">
                        <h2 class="fs-4 fw-bolder">Persoonlijke gegevens</h2>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column flex-grow-1 me-5">
                                <label for="name">Naam</label>
                                <input class="bg-white form-control" type="text" name="name" id="name" required placeholder="Naam van docent/ontwikkelaar" value='{{ session('name') }}' >
                            </div>
                            <div class="d-flex flex-column flex-grow-1 ms-5 w-25">
                                <label for="email">E-mailadres</label>
                                <input class="bg-white form-control" type="email" name="email" id="email" required placeholder="eerder-al-ingevuld@avans.nl" value='{{ session('email') }}' >
                            </div>
                        </div>
                    </section>

                    <section class="py-4 w-90 mx-auto">
                        <h2 class="fs-4 fw-bolder">Opleiding & Academie gegevens</h2>
                        <div class="d-flex justify-content-between">
                            <div class="d-flex flex-column flex-grow-1 me-5">
                                <label for="course">Opleiding</label>
                                <input class="bg-white form-control" type="text" name="course" id="course" required placeholder="Naam van de opleiding" value='{{session('course')}}'>
                            </div>
                            <div class="d-flex flex-column flex-grow-1 ms-5 w-25">
                                <label for="academy">Academie</label>
                                <select class="bg-white form-control" name="academy" id="academy" required>
                                    @php
                                        $academyChoice = session('academy');
                                    @endphp
                                    @if ($academyChoice)
                                        <option value="{{ $academyChoice }}">{{ $academyChoice }}</option>
                                    @else
                                        <option value="" disabled selected>Naam van de academie</option>
                                    @endif

                                    @foreach($academies as $academy)
                                        <option value="{{ $academy->name }}">{{ $academy->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </section>

                    <section class="py-4 w-90 ms-5">
                        <h2 class="fs-4 fw-bolder ms-4">Module gegevens</h2>
                        <div class="d-flex justify-content-between ms-4 w-90 pe-5">
                            <div class="d-flex flex-column flex-grow-1 pe-5">
                                <label for="module">Module</label>
                                <input class="bg-white form-control w-50" name="module" type="text" id="module" required placeholder="Naam van de module" value='{{ session('module')}}' >
                            </div>
                        </div>
                    </section>

                    <section class="pb-3 w-90 mx-auto">

                        <div class="d-flex flex-column w-100">
                            <label for="summary">Samenvatting</label>
                            <textarea class="bg-white form-control" rows="4" name="summary" id="summary" placeholder="Schrijf een korte samenvatting van de module">{{ session('summary') }}</textarea>
                        </div>
                    </section>

                    <div class="d-flex justify-content-end me-5 pe-4">
                        <a href='/' class="btn text-primary px-4">← Vorige</a>
                        <button class="btn btn-primary px-4">Volgende →</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>