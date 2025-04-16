<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    @endsection
    @section('scripts')
        <script src="{{ asset('js/auth.js') }}" defer></script>
    @endsection

    <main class="position-relative vh-100">
        <div class="position-absolute top-0 start-0 w-100">
            <div class="container mt-5">
                <img src="{{ asset('images/Logo.svg') }}" alt="BlendBarometer" class="me-2">
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center h-100">
            <div id="help" class="d-flex flex-column">
                <h2 class="fw-bold">Verifieer uw e-mail</h2>
                <p><strong>We hebben een verificatiecode verstuurd <br>naar *****le@avans.nl</strong></p>
                <form action="{{ route('verify.submit') }}" method="POST" class="d-flex flex-column">
                    @csrf
                    <label for="code">Verificatie code</label>
                    <section class="d-flex justify-content-center gap-2 mt-3">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                        <input type="text" required maxlength="1" class="form-control text-center rectangle">
                    </section>
                    @error('code')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <div class="d-flex flex-column align-items-center">
                        <button type="submit" class="btn btn-primary mt-3 w-100">Verifieer</button>
                        <a href="{{ route('login.submit') }}" class="mt-2 text-reset"><small>Opnieuw sturen</small></a>
                    </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </main>
</x-layout>
