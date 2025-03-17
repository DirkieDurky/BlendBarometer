<x-layout>
    <h1>testing</h1>
    <?php 
        echo "naam: " . session('name') . "<br>"; //print session values
        echo "email: " . session('email') . "<br>";
        echo 'opleiding: '. session('course') . "<br>";
        echo 'academie: '. session('academy') . "<br>";
        echo 'module: '. session('module') . "<br>";
        echo 'samenvatting: '. session('summary') . "<br>";
    ?>
    <a href="/information" class="previous-button">&lt; Vorige</a>
</x-layout>