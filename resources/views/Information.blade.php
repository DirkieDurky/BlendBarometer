<x-layout>

    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar on the left -->
            <div class="col-md-3">
                <x-stepSidebar :title="'Gegevens'" :smallDescription="'Wie vult de barometer in'" :current_step_name="'information'">Personal information and steps.</x-stepSidebar>
            </div>

            <!-- Main content on the right -->
            <div class="col-md-9 container">
            <h1>Gegevens</h1>

            <form method="post" action="/information/test">
                @csrf <!--DON'T FORGET TO ADD THIS COMMAND TO YOUR FORMS, OTHERWISE IT WILL NOT WORK-->
                <section class="section">
                    <h2>Persoonlijke gegevens</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="name">Naam</label>
                            <input type="text" name="name" id="name" placeholder="Naam van docent/ontwikkelaar" value="<?php echo session('name') ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">E-mailadres</label>
                            <input type="email" name="email" id="email" placeholder="eerder-al-ingevuld@avans.nl" value="<?php echo session('email') ?>">
                        </div>
                    </div>
                </section>

                <section class="section">
                    <h2>Opleiding & Academie gegevens</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="course">Opleiding</label>
                            <input type="text" name="course" id="course" placeholder="Naam van de opleiding" value="<?php echo session('course') ?>">
                        </div>
                        <div class="form-group">
                            <label for="academy">Academie</label>
                            <select name="academy" id="academy">
                                <?php
                                    $academyChoice = session('academy');
                                    if ($academyChoice) {
                                        echo "<option value=\"$academyChoice\">$academyChoice</option>";
                                    } else {
                                        echo "<option value=\"\" disabled selected>Naam van de academie</option>";
                                    }
                                ?>
                                <option value="Optie 1">Optie 1</option>
                                <option value="Optie 2">Optie 2</option>
                            </select>
                        </div>
                    </div>
                </section>

                <section class="section">
                    <h2>Module gegevens</h2>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="module">Module</label>
                            <input name="module" type="text" id="module" placeholder="Naam van de module" value="<?php echo session('module') ?>">
                        </div>
                    </div>
                </section>

                <section class="section">

                    <div class="form-group full-width">
                        <label for="summary">Samenvatting</label>
                        <textarea name="summary" id="summary" placeholder="Schrijf een korte samenvatting van de module"><?php echo session('summary'); ?></textarea>
                    </div>
                </section>

                <div class="button-container">
                    <button type="submit" class="next-button">Volgende →</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>