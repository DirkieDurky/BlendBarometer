<!--{{ $catagoryNr }}-->
<form action="/deel2/{{ $catagoryNr }}" method="post">
    @csrf

    <h1>{{ $catagoryName }}</h1>
    @for ($i = 0; $i < count($questions); $i++)
        <x-moduleQuestion :question="$questions[$i]['text']" :questionId="$i"/>
    @endfor

    <button type="submit">invoeren</button>
</form>