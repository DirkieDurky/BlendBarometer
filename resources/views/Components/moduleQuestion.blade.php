<div>
    <p>{{ $question }}</p>
    <input type="radio" id="little-{{ $questionId }}" name="vraag_{{ $questionId }}" value="0">
    <label for="little-{{ $questionId }}">Dit doen we niet tot weinig</label>
    <input type="radio" id="sometimes-{{ $questionId }}" name="vraag_{{ $questionId }}" value="1">
    <label for="sometimes-{{ $questionId }}">Dit doen we een beetje</label>
    <input type="radio" id="often-{{ $questionId }}" name="vraag_{{ $questionId }}" value="2">
    <label for="often-{{ $questionId }}">Ja dit doen we</label>
</div>