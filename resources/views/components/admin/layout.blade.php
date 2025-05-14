<x-layout>
    @section('styles')
        <style>
            body {
                background-color: #F4F9F7;
            }
        </style>
    @endsection
    <header>
        <nav class="navbar navbar-expand-lg shadow-sm bg-white mb-4">
            <div class="container">
                <a href="{{ route('admin.edit-questions') }}" class="navbar-brand">
                    <img src="{{ asset('images/logo.svg') }}" alt="Logo" class="logo">
                </a>

                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarContent"
                        aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 gap-2">
                        <li class="nav-item fw-medium">
                            <a class="nav-link" href="{{ route('admin.email-rules') }}">E-mail regels</a>
                        </li>
                        <li class="nav-item fw-medium">
                            <a class="nav-link" href="{{ route('admin.edit-questions') }}">Vragen bewerken</a>
                        </li>
                        <li class="nav-item fw-medium">
                            <a class="nav-link" href="{{ route('admin.edit-content') }}">Content bewerken</a>
                        </li>
                        <li class="nav-item fw-medium">
                            <a class="nav-link text-danger" href="{{ route('admin.logout') }}">
                                <i class="bi bi-box-arrow-right"></i> Uitloggen
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </header>

    <main>
        {{ $slot }}
    </main>
</x-layout>
