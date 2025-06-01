@props(['lessonCategories', 'lessonSubCategories', 'lessonQuestions'])

<x-admin.layout :noNavbarMargin="true">
    <div class="d-flex">
        <aside class="sidebar d-none d-xl-block p-4 bg-white shadow-sm">
            @foreach ($lessonCategories as $cat)
                    <a href="#category-{{ $cat->id }}" class="text-decoration-none text-dark" ><h4 class="mt-2">{{ $cat->name }}</h4></a>

                @foreach ($lessonSubCategories->where('question_category_id', $cat->id) as $subCat)
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="#subcategory-{{ $subCat->id }}" class="d-flex align-items-center justify-content-between text-dark">{{ $subCat->name }}</a>
                        <span style="font-size: 1.5rem; cursor: pointer;">&#8226;&#8226;&#8226;</span>
                    </div>
                @endforeach

                <div class="mt-2">
                    <a href="#" class="btn btn-sm btn-outline-primary border-2 mb-2" style="padding: 0.4rem 1.1rem;">Categorie toevoegen</a>
                </div>
            @endforeach
        </aside>

        <main class="content flex-grow-1 px-5 py-4 overflow-x-hidden">
            {{ $slot }}
        </main>
    </div>
</x-admin.layout>
