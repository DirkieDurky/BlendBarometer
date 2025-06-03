@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


<div class="modal fade" id="createQuestionModal" tabindex="-1" aria-labelledby="createQuestionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.edit-lesson-questions.create') }}" method="POST">
      @csrf
      @method('POST')
        <input type="hidden" id="categoryId" name="question_category_id" value="">
        <input type="hidden" id="subCategoryId" name="sub_category_id" value="">
        <div class="modal-header">
          <h5 class="modal-title" id="CreateQuestionModalLabel">Vraag toevoegen</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Sluiten"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label for="questionText" class="form-label">Vraag</label>
            <input type="text" class="form-control" id="questionText" name="text">
          </div>
          <div class="mb-3">
            <label for="questionLabel" class="form-label">Label</label>
            <input type="text" class="form-control" id="questionLabel" name="label">
          </div>
          <div class="mb-3 form-check form-switch">
            <input class="form-check-input" type="checkbox" id="extraInfoSwitch">
            <label class="form-check-label" for="extraInfoSwitch">Extra informatie</label>
          </div>
          <div class="mb-3">
            <textarea class="form-control" id="extraInfoText" name="description" placeholder="Voeg hier extra informatie toe"></textarea>
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
    var editModal = document.getElementById('createQuestionModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;

        var catId = button.getAttribute('data-category-id');
        var subCatId = button.getAttribute('data-subcategory-id');
        document.getElementById('categoryId').value = catId || '';
        document.getElementById('subCategoryId').value = subCatId || '';
    });

    // Optional: Toggle textarea enabled/disabled based on switch
    document.getElementById('extraInfoSwitch').addEventListener('change', function () {
        document.getElementById('extraInfoText').disabled = !this.checked;
    });
});
</script>