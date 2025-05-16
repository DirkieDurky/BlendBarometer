
<h5>Content</h5>
<div id="home-editor" class="mb-3">
   {!! $home !!}
</div>
<form id="home-form" action="{{ route('admin.edit-content.home-update') }}" method="POST" class="w-100 d-flex justify-content-end">
    @csrf
    @method('PUT')
    <button id="home-reset" type="reset" class="btn btn-outline-primary mb-5 me-2" onclick="reloadPage()">Annuleren</button>
    <button id="home-save" type="submit" class="btn btn-primary mb-5">Opslaan</button>
</form>