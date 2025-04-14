<x-progress-step section="Gegevens" title="Wie vult de barometer in" description="We willen graag weten wie dit invult en voor welke module het bedoeld is." current_step_name="information">
    <!-- Main content on the right -->
    <form method="post" action="{{ route('information') }}" class="ms-5">
        <h1 class="pb-2 pt-4 mx-auto mb-2 mt-4 fs-2 fw-bolder">Gegevens</h1>
        @csrf <!--DON'T FORGET TO ADD THIS COMMAND TO YOUR FORMS, OTHERWISE IT WILL NOT WORK-->
        <section class="py-4 mx-auto">
            <h2 class="fs-4 fw-bolder">Persoonlijke gegevens</h2>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-grow-1 me-5">
                    <label for="name">Naam</label>
                    <input class="bg-white form-control" type="text" name="name" id="name" required placeholder="Naam van docent/ontwikkelaar" value='{{ session('name') }}'>
                </div>
                <div class="d-flex flex-column flex-grow-1 ms-5 w-25">
                    <label for="email">E-mailadres</label>
                    <input class="bg-white form-control" type="email" name="email" id="email" required placeholder="eerder-al-ingevuld@avans.nl" value='{{ session('email') }}'>
                </div>
            </div>
        </section>

        <section class="py-4 mx-auto">
            <h2 class="fs-4 fw-bolder">Opleiding & Academie gegevens</h2>
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column flex-grow-1 me-5">
                    <label for="course">Opleiding</label>
                    <input class="bg-white form-control" type="text" name="course" id="course" required placeholder="Naam van de opleiding" value='{{ session('course') }}'>
                </div>
                <div class="d-flex flex-column flex-grow-1 ms-5 w-25">
                    <label for="academy">Academie</label>
                    <select class="bg-white form-select" name="academy" id="academy" required>
                        @php
                            $academyChoice = session('academy');
                        @endphp
                        @if ($academyChoice)
                            <option value="{{ $academyChoice }}">{{ $academyChoice }}</option>
                        @else
                            <option value="" disabled selected>Naam van de academie</option>
                        @endif

                        @foreach ($academies as $academy)
                            <option value="{{ $academy->name }}">{{ $academy->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </section>

        <section class="py-4 mx-auto">
            <h2 class="fs-4 fw-bolder">Module gegevens</h2>
            <div class="d-flex justify-content-between w-50">
                <div class="d-flex flex-column flex-grow-1 pe-4">
                    <label for="module">Module</label>
                    <input class="bg-white form-control" name="module" type="text" id="module" required placeholder="Naam van de module" value='{{ session('module') }}'>
                </div>
            </div>
        </section>

        <section class="pb-3 mx-auto">

            <div class="d-flex flex-column w-100">
                <label for="summary">Samenvatting</label>
                <textarea class="bg-white form-control" rows="4" name="summary" id="summary" placeholder="Schrijf een korte samenvatting van de module">{{ session('summary') }}</textarea>
            </div>
        </section>

        <div class="d-flex justify-content-end me-5 mb-5">
            <a href="{{ route('home') }}" class="btn text-primary px-4"><i class="bi bi-arrow-left"></i> Vorige</a>
            <button type="submit" class="btn btn-primary px-4">Volgende <i class="bi bi-arrow-right"></i></button>
        </div>
    </form>
</x-progress-step>
