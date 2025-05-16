
<div class="d-flex justify-content-between align-items-end mb-2">
    <h5>Content</h5>
    <form id="form" action="{{ route('admin.edit-content.home-save') }}" method="POST">
        @csrf
        <button id="save" type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
<div id="editor"></div>