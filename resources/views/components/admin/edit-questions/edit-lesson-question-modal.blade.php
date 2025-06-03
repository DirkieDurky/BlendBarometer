<div class="modal fade" id="editQuestionModal" tabindex="-1" aria-labelledby="editQuestionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editQuestionForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" id="questionId" name="question_id">
        <div class="modal-header">
          <h5 class="modal-title" id="editQuestionModalLabel">Vraag bewerken</h5>
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
    var editModal = document.getElementById('editQuestionModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget;
        var questionId = button.getAttribute('data-question-id');
        var question = button.getAttribute('data-question');
        var label = button.getAttribute('data-label');
        var description = button.getAttribute('data-description');

        var form = document.getElementById('editQuestionForm');
        form.action = '/admin/vragen-bewerken/' + questionId + '/update';

        document.getElementById('questionId').value = questionId || '';
        document.getElementById('questionText').value = question || '';
        document.getElementById('questionLabel').value = label || '';
        document.getElementById('extraInfoText').value = description || '';
        document.getElementById('extraInfoSwitch').checked = !!description;
    });

    // Optional: Toggle textarea enabled/disabled based on switch
    document.getElementById('extraInfoSwitch').addEventListener('change', function () {
        document.getElementById('extraInfoText').disabled = !this.checked;
    });
});
</script>