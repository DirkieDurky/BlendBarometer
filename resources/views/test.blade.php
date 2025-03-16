<x-layout>
    <h1>testing</h1>
    <?php 
        echo "naam: " . session('name') . "<br>";
        echo "email: " . session('email') . "<br>";
        echo 'opleiding: '. session('opleiding') . "<br>";
        echo 'academie: '. session('academie') . "<br>";
        echo 'module: '. session('module') . "<br>";
        echo 'samenvatting: '. session('samenvatting') . "<br>";
    ?>
    <a href="/information" class="previous-button">&lt; Vorige</a>
</x-layout>