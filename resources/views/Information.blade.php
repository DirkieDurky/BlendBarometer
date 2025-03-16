<x-layout>
    <div class="container">
        <h1>Gegevens</h1>

        <section class="section">
            <h2>Persoonlijke gegevens</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="naam">Naam</label>
                    <input type="text" id="naam" placeholder="Naam van docent/ontwikkelaar">
                </div>
                <div class="form-group">
                    <label for="email">E-mailadres</label>
                    <input type="email" id="email" placeholder="eerder-al-ingevuld@avans.nl">
                </div>
            </div>
        </section>

        <section class="section">
            <h2>Opleiding & Academie gegevens</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="opleiding">Opleiding</label>
                    <input type="text" id="opleiding" placeholder="Naam van de opleiding">
                </div>
                <div class="form-group">
                    <label for="academie">Academie</label>
                    <div class="select-wrapper">
                        <select id="academie">
                            <option value="" disabled selected>Naam van de academie</option>
                            <option value="optie1">Optie 1</option>
                            <option value="optie2">Optie 2</option>
                        </select>
                        <span class="select-arrow"></span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <h2>Module gegevens</h2>
            <div class="form-row">
                <div class="form-group">
                    <label for="module">Module</label>
                    <input type="text" id="module" placeholder="Naam van de module">
                </div>
            </div>
        </section>

        <section class="section">
            <h2>Samenvatting</h2>
            <div class="form-row">
                <div class="form-group full-width">
                    <textarea id="samenvatting" placeholder="Schrijf een korte samenvatting van de module"></textarea>
                </div>
            </div>
        </section>

        <div class="button-container">
            <button class="next-button">Volgende →</button>
        </div>
    </div>
</x-layout>