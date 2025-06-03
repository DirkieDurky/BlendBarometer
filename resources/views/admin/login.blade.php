<x-layout>
    <div class="position-absolute top-0 start-0 w-100">
        <div class="container mt-5">
            <a href="{{ route('admin.edit-content') }}" class="d-block mb-4">
                <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer">
            </a>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center min-vh-100 align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <h1 class="card-title mb-2 fw-bold">Inloggen</h1>
                <form method="POST" action="{{ route('admin.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Vul email in">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Wachtwoord</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required autocomplete="current-password"
                            placeholder="Vul wachtwoord in">
                    </div>

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <span class="text-danger fw-bold small">{{ $error }}</span>
                        @endforeach
                    @endif

                    <div>
                        <button type="submit" class="btn btn-primary mt-3 pl-5 pr-5">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>