
<h5>Content</h5>
<form action="{{ route('admin.edit-content.home-update') }}" method="POST" class="form w-100 d-flex justify-content-end">
    @csrf
    @method('PUT')
</form>