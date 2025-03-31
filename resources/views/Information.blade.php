<x-layout>
    <div class="container-fluid bg-light-greenish">
        <div class="row">
            <!-- Sidebar on the left -->
            <div class="col-md-3">
                <x-stepSidebar :title="'Gegevens'" :smallDescription="'Wie vult de barometer in'" :current_step_name="'information'">We willen graag weten wie dit invult en voor welke module het bedoeld is.</x-stepSidebar>
            </div>

            <!-- Main content on the right -->
            <div class="col-md-9 container">
                <form class="form-information"method="post" action="/information/safe">
                    <h1 class="mb-3 mt-5 fs-2 fw-bolder">Gegevens</h1>
                    @csrf <!--DON'T FORGET TO ADD THIS COMMAND TO YOUR FORMS, OTHERWISE IT WILL NOT WORK-->
                    <section class="section">
                        <h2 class="form-section-head">Persoonlijke gegevens</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Naam</label>
                                <input class="bg-white" type="text" name="name" id="name" required placeholder="Naam van docent/ontwikkelaar" value={{ session('name') }} >
                            </div>
                            <div class="form-group">
                                <label for="email">E-mailadres</label>
                                <input class="bg-white" type="email" name="email" id="email" required placeholder="eerder-al-ingevuld@avans.nl" value={{ session('email') }} >
                            </div>
                        </div>
                    </section>

                    <section class="section">
                        <h2>Opleiding & Academie gegevens</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="course">Opleiding</label>
                                <input class="bg-white" type="text" name="course" id="course" required placeholder="Naam van de opleiding" value={{session('course')}}>
                            </div>
                            <div class="form-group">
                                <label for="academy">Academie</label>
                                <select class="bg-white" name="academy" id="academy" required>
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

                    <section class="section">
                        <h2>Module gegevens</h2>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="module">Module</label>
                                <input class="bg-white" name="module" type="text" id="module" required placeholder="Naam van de module" value={{ session('module')}} >
                            </div>
                        </div>
                    </section>

                    <section class="section">

                        <div class="form-group full-width">
                            <label for="summary">Samenvatting</label>
                            <textarea class="bg-white" name="summary" id="summary" placeholder="Schrijf een korte samenvatting van de module">{{ session('summary') }}</textarea>
                        </div>
                    </section>

                    <div class="button-container">
                        <button type="submit" class="next-button">Volgende →</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>