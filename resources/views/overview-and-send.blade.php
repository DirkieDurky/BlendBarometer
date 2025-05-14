<x-progress-step section="Resultaten" title="Overzicht en versturen"
    description="Het versturen van de ingevulde antwoorden" current_step_name="results">
    <div class="alert alert-warning">
        Uw gegevens zijn nog niet verstuurd. Als u dit venster sluit gaan uw gegevens verloren.
    </div>

    <h1>Overzicht en versturen</h1>
    <p>Je staat op het punt de resultaten van dit formulier definitief te versturen</p>

    <form method="get" action="{{ route('send') }}">
        @csrf

        <x-navigation-buttons-with-submit :previous="route('results')" />
    </form>

    <script>
        document.addEventListener("keydown", (e) => {
            if (e.key === "Enter") {
                const submitButton = document.querySelector('button.btn-primary');

                if (submitButton) {
                    submitButton.click();
                }
            }
        })
    </script>
</x-progress-step>