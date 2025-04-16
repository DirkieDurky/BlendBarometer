<x-layout>
    @section('styles')
        <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
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
                <p><em>Alleen een @avans.nl e-mail wordt geaccepteerd.</em></p>
                <form action="{{ route('login.submit') }}" method="POST">
                    @csrf
                    <label for="email">E-mail</label>
                    <input id="email" name="email" type="email" class="form-control p-2" value="{{ old('email') }}" placeholder="E-mail van gebruiker" required>
                    @error('email')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                    <button type="submit" class="btn btn-primary mt-3 w-100">Verder</button>
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
