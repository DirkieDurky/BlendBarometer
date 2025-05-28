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
                <h2 class="card-title mb-4 fw-bold">Inloggen</h2>
                <form method="POST" action="{{ route('admin.submit') }}">
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label fw-semibold">Email</label>
                        <input type="email" class="form-control" id="email"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Vul email in">
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label fw-semibold">Wachtwoord</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                            id="password" name="password" required autocomplete="current-password"
                            placeholder="Vul wachtwoord in">
                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg mt-3">Log in</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layout>