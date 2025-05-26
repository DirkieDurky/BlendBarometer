<form action="{{ route('admin.edit-content.chart') }}" method="POST" class="form w-100" onreset="hideButtons()">
    @csrf
    @method('PUT')
    <div class="d-flex pb-4">
        <div class="d-flex flex-column gap-5 w-100 px-3">
            @foreach ($lessonLevelPhysicalSubcategories as $category)
                <div>
                    <h3 class="h5">Grafiek fysiek - {{ $category->name }}</h3>
                    <p>Uitleg</p>
                    <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $category->id }}">
                    <textarea onclick="showButtons()" class="w-100 h-75 pb-5 border rounded p-2" name="items[{{ $loop->index }}][description]">{{ $category->description }}</textarea>
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-column gap-5 w-100 ps-3">
            @foreach ($lessonLevelOnlineSubcategories as $category)
                <div>
                    <h3 class="h5">Grafiek online - {{ $category->name }}</h3>
                    <p>Uitleg</p>
                    <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $category->id }}">
                    <textarea onclick="showButtons()" class="w-100 h-75 pb-5 border rounded p-2" name="items[{{ $loop->index }}][description]">{{ $category->description }}</textarea>
                </div>
            @endforeach
        </div>
    </div>


    <div class="d-flex flex-row justify-content-end mt-3" id="form-buttons">
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
