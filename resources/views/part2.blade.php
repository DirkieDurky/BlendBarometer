<x-layout>
    <div class="container mt-5">
        <form action="/deel2/{{ $category->id }}/navigate" method="post">
            @csrf

            <h1>{{ $category->name }}</h1>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @for ($i = 0; $i < count($category->questions); $i++)
                <x-moduleQuestion :question="$category->questions[$i]['text']" :questionId="$i" :answer="$answers[$category->id][$i] ?? null" />
                @endfor

                <div class="mt-3">
                    <button name="navigation" value="previous" type="submit" class="btn btn-secondary">&larr; Vorige</button>
                    <button name="navigation" value="next" type="submit" class="btn btn-primary">Volgende &rarr;</button>
                </div>
        </form>
    </div>
</x-layout>