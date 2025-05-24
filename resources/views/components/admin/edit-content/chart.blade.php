<h2>
    Hier komt de grafiek content bewerken
</h2>
<form action="{{ route('admin.edit-content.chart') }}" method="POST" class="form w-100 d-flex justify-content-end" onreset="hideButtons()">
    @csrf
    @method('PUT')
    <input type="text" onclick="showButtons()">


    <div class="d-flex justify-content-end gap-2 mt-3" id="form-buttons" style="display: none;">
        <button id="reset-button" type="reset" class="btn btn-outline-primary mb-5 me-2 d-none">Annuleren</button>
        <button id="save-button" type="submit" class="btn btn-primary mb-5 me-2 d-none">Opslaan</button>
    </div>
</form>

<script>
    function showButtons() {
        const resetButton = document.getElementById('reset-button');
        const saveButton = document.getElementById('save-button');
        
        resetButton.classList.remove('d-none');
        saveButton.classList.remove('d-none');
    }

    function hideButtons() {
        const resetButton = document.getElementById('reset-button');
        const saveButton = document.getElementById('save-button');
        
        resetButton.classList.add('d-none');
        saveButton.classList.add('d-none');
    }
</script>
{{-- <div class="d-flex flex-row gap-4">
        <div class="d-flex flex-column gap-3">
            <h2>Fysieke leeractiviteiten</h2>
            @foreach ($lessonLevelPhysicalSubcategories as $category)
                <div class="card graph-card p-3">
                    <canvas id="physical-{{ $category->id }}" class="bg-white rounded mb-2"></canvas>
                    <strong>{{ $category->name }}</strong>
                    <p class="mb-0">{{ $lessonLevelPhysicalDescriptions[$category->id]->description }}</p>
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-column gap-3">
            <h2>Online leeractiviteiten</h2>
            @foreach ($lessonLevelOnlineSubcategories as $category)
                <div class="card graph-card p-3">
                    <canvas id="online-{{ $category->id }}" class="bg-white rounded mb-2"></canvas>
                    <strong>{{ $category->name }}</strong>
                    <p class="mb-0">{{ $lessonLevelOnlineDescriptions[$category->id]->description }}</p>
                </div>
            @endforeach
        </div> --}}
