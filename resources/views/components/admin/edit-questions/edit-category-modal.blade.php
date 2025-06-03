<div class="modal fade" id="editCategoryModal" tabindex="-1" aria-labelledby="editCategoryModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editCategoryForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" id="categoryName" name="category_name">
        <div class="modal-header">
          <h5 class="modal-title" id="editCategoryModalLabel">Categorie bewerken</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Sluiten"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="categoryText" class="form-label">Categorienaam</label>
            <input type="text" class="form-control" id="categoryText" name="name">
          </div>
          <div class="mb-3">
                <label for="formSectionSelect" class="form-label">Formuliersectie</label>
                <select class="form-select" id="formSectionSelect" name="form_section_id" required>
                    <option value="" disabled selected>Kies een sectie</option>
                    @foreach($formSections as $section)
                        <option value="{{ $section->id }}">{{ $section->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-primary" data-bs-dismiss="modal">Annuleren</button>
          <button type="submit" class="btn btn-primary">Opslaan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    var editModal = document.getElementById('editCategoryModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var category = button.getAttribute('data-category');
        // var formSectionId = JSON.parse(button.getAttribute('data-form-sections'));
        var formSectionId = button.getAttribute('data-form-section-id');

        var form = document.getElementById('editCategoryForm');
        form.action = '/admin/vragen-bewerken/categorie-bewerken/' + categoryId + '/update';
        document.getElementById('formSectionSelect').value = formSectionId || 'test';        
        document.getElementById('categoryName').value = category || '';
        document.getElementById('categoryText').value = category || '';

        console.log('DEBUG - formSectionId:', formSectionId);
    });

    // Optional: Toggle textarea enabled/disabled based on switch
    document.getElementById('extraInfoSwitch').addEventListener('change', function () {
        document.getElementById('extraInfoText').disabled = !this.checked;
    });
});
</script>