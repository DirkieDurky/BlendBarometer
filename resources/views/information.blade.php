<x-progress-step section="Gegevens"
                 title="Wie vult de barometer in"
                 description="We willen graag weten wie dit invult en voor welke module het bedoeld is."
                 current_step_name="information">

    <form method="post" action="{{ route('information') }}">
        @csrf {{-- Required for form security --}}

        <h1>Gegevens</h1>

        <section class="py-4">
            <h2 class="fs-4">Persoonlijke gegevens</h2>
            <div class="row gx-4">
                <div class="col">
                    <label for="name">Naam</label>
                    <input class="form-control" type="text" name="name" id="name" required
                           placeholder="Naam van docent/ontwikkelaar" value='{{ session('name') }}'>
                </div>
                <div class="col">
                    <label for="email">E-mailadres</label>
                    <input class="form-control" type="email" name="email" id="email" required
                           placeholder="eerder-al-ingevuld@avans.nl" value='{{ session('email') }}' disabled>
                </div>
            </div>
        </section>

        <section class="py-4">
            <h2 class="fs-4">Opleiding & Academie gegevens</h2>
            <div class="row gx-4">
                <div class="col">
                    <label for="course">Opleiding</label>
                    <input class="form-control" type="text" name="course" id="course" required
                           placeholder="Naam van de opleiding" value='{{ session('course') }}'>
                </div>
                <div class="col">
                    <label for="academy">Academie</label>
                    <select class="form-select" name="academy" id="academy" required>
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

        <section class="py-4">
            <h2 class="fs-4">Module gegevens</h2>
            <div class="row w-50">
                <div class="col pe-0">
                    <label for="module">Module</label>
                    <input class="form-control" name="module" type="text" id="module" required
                           placeholder="Naam van de module" value='{{ session('module') }}'>
                </div>
            </div>

            <div class="mt-4">
                <label for="summary">Samenvatting</label>
                <textarea class="form-control" rows="4" name="summary" id="summary"
                          placeholder="Schrijf een korte samenvatting van de module">{{ session('summary') }}</textarea>
            </div>
        </section>

        <x-navigation-buttons-with-submit :previous="route('home')"/>
    </form>
</x-progress-step>
