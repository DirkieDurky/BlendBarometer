<x-layout>
    <div class="container">
        <h1>Gegevens</h1>

        <form method="post" action="/information/test">
            @csrf
            <section class="section">
                <h2>Persoonlijke gegevens</h2>
                <div class="form-row">
                    <div class="form-group">
                        <label for="naam">Naam</label>
                        <input type="text" name="naam" id="naam" placeholder="Naam van docent/ontwikkelaar" value="<?php echo session('name') ?>">
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
                        <label for="opleiding">Opleiding</label>
                        <input type="text" name="opleiding" id="opleiding" placeholder="Naam van de opleiding" value="<?php echo session('opleiding') ?>">
                    </div>
                    <div class="form-group">
                        <label for="academie">Academie</label>
                        <select name="academie" id="academie">
                            <?php
                                $academieChoice = session('academie');
                                if ($academieChoice) {
                                    echo "<option value=\"$academieChoice\">$academieChoice</option>";
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
                    <label for="samenvatting">Samenvatting</label>
                    <textarea name="samenvatting" id="samenvatting" placeholder="Schrijf een korte samenvatting van de module"><?php echo session('samenvatting'); ?></textarea>
                </div>
            </section>

            <div class="button-container">
                <button type="submit" class="next-button">Volgende →</button>
            </div>
        </form>
    </div>
</x-layout>