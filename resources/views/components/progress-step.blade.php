<x-layout>
    <main>
        <div class="d-flex flex-row vw-100">
            <aside class="d-flex flex-column flex-shrink-0 p-4 bg-white" style="width: 280px;">
                <h1>Zijbalk</h1>
            </aside>
            <div class="content flex-grow-1 px-5 py-4 h-100 overflow-scroll">
                {{ $slot }}
            </div>
        </div>
    </main>
</x-layout>
