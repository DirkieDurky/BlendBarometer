<h5>Content</h5>
<form action="{{ route('admin.edit-content.intermediate-update', ['section' => $section]) }}" method="POST"
      class="form w-100 d-flex justify-content-end">
    @csrf
    @method('PUT')
    <div class="editor mb-2 bg-white">
        {!! $content !!}
    </div>
</form>
@error('content') <p class="text-danger fw-bold small">{{ $message }}</p> @enderror
