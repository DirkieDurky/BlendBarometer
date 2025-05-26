<form action="{{ route('admin.edit-content.intermediate-update', ['section' => $section]) }}" method="POST"
      class="form">
    @csrf
    @method('PUT')
    <h5>Pagina tonen</h5>
    <p>Moet deze pagina in beeld komen voor de invuller?</p>
    <div class="form-check form-switch mb-4">
        <input
            class="form-check-input"
            type="checkbox"
            role="switch"
            id="show"
            {{ $show == '1' ? 'checked' : '' }}
            name="show"
            onchange="showButtons()">
        <label for="show">Tonen</label>
    </div>

    <h5>Content</h5>
    <div class="editor mb-2 bg-white">
        {!! $content !!}
    </div>
</form>
@error('content') <p class="text-danger fw-bold small">{{ $message }}</p> @enderror

<script>
    function showButtons() {
        const buttons = document.querySelectorAll('.form button');
        buttons.forEach(btn => {
            btn.style.display = 'block';
        });
    }
</script>
