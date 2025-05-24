<x-admin.layout>
    <div class="container">
         {{-- <div class="d-flex flex-row gap-4">
        <div class="d-flex flex-column gap-3">
            <h2>Fysieke leeractiviteiten</h2>
            @foreach ($lessonLevelPhysicalSubcategories as $category)
                <div class="card graph-card p-3">
                    <canvas id="physical-{{ $category->id }}" class="bg-white rounded mb-2"></canvas>
                    <strong>{{ $category->name }}</strong>
                    <p class="mb-0">{{ $lessonLevelPhysicalDescriptions[$category->id]->description }}</p>
                </div>
            @endforeach
        </div>
        <div class="d-flex flex-column gap-3">
            <h2>Online leeractiviteiten</h2>
            @foreach ($lessonLevelOnlineSubcategories as $category)
                <div class="card graph-card p-3">
                    <canvas id="online-{{ $category->id }}" class="bg-white rounded mb-2"></canvas>
                    <strong>{{ $category->name }}</strong>
                    <p class="mb-0">{{ $lessonLevelOnlineDescriptions[$category->id]->description }}</p>
                </div>
            @endforeach
        </div> --}}
    </div>
    </div>
</x-admin.layout>