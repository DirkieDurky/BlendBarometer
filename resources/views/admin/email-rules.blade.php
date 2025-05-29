<x-admin.layout>
    <div class="container">
        <h1 class="mb-4">E-mail regels</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        {{-- === default rule === --}}
        <h4>Standaard e-mailadres(sen)</h4>
        <table class="table">
            @foreach($rules['_default'] ?? collect() as $rule)
                <tr>
                    <td>{{ $rule->email }}</td>
                    <td class="text-end">
                        <form method="POST"
                              action="{{ route('admin.email-rules.destroy', $rule) }}"
                              class="d-inline">
                            @csrf @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Weet je het zeker?')">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            {{-- blank row (old() preserves input) --}}
            <tr>
                <td colspan="2">
                    <form method="POST" action="{{ route('admin.email-rules.store') }}"
                          class="d-flex gap-2">
                        @csrf
                        <input type="hidden" name="academy_name">
                        <input type="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control @error('email') is-invalid @enderror"
                               placeholder="mailbox@voorbeeld.nl"
                               required>
                        <button class="btn btn-primary">Toevoegen</button>
                    </form>
                </td>
            </tr>
        </table>

        <hr>

        {{-- === per-academy rules === --}}
        @foreach($academies as $academy)
            <h4 class="mt-4">{{ $academy->abbreviation }} – {{ $academy->name }}</h4>
            <table class="table">
                @foreach($rules[$academy->name] ?? collect() as $rule)
                    <tr>
                        <td>{{ $rule->email }}</td>
                        <td class="text-end">
                            <form method="POST"
                                  action="{{ route('admin.email-rules.destroy', $rule) }}"
                                  class="d-inline">
                                @csrf @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Weet je het zeker?')">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                {{-- blank row --}}
                <tr>
                    <td colspan="2">
                        <form method="POST" action="{{ route('admin.email-rules.store') }}"
                              class="d-flex gap-2">
                            @csrf
                            <input type="hidden" name="academy_name" value="{{ $academy->name }}">
                            <input type="email"
                                   name="email"
                                   class="form-control"
                                   placeholder="mailbox@voorbeeld.nl"
                                   required>
                            <button class="btn btn-primary">Toevoegen</button>
                        </form>
                    </td>
                </tr>
            </table>
        @endforeach
    </div>
</x-admin.layout>
