@props(['section', 'title', 'description', 'current_step_name'])
<x-layout>
    <div class="d-flex">
        <aside class="sidebar d-none d-md-block p-4 bg-white">
            <a href="{{ route('home') }}" class="d-block mb-4">
                <img src="{{ asset('images/logo.svg') }}" alt="BlendBarometer">
            </a>

            <div class="mb-5">
                <p class="text-primary fw-bold mb-0">{{ $section }}</p>
                <h1>{{ $title }}</h1>
                <p class="text-muted">{{ $description }}</p>
            </div>


            @php
                // Update the steps array with the desired step names and labels if needed
                $steps = [
                    ['label' => 'Gegevens', 'name' => 'information'],
                    ['label' => 'Les niveau', 'name' => 'lessonLevel'],
                    ['label' => 'Module niveau', 'name' => 'moduleLevel'],
                    ['label' => 'Overzicht & Resultaten', 'name' => 'results']
                ];
                $status = 'complete';
            @endphp

            <div>
                @foreach ($steps as $index => $step)
                    @php
                        if ($current_step_name == $step['name']) {
                            $status = 'active';
                        } elseif ($status == 'active') {
                            $status = 'to-do';
                        }
                    @endphp

                    <div class="step-vertical {{ $status }}">
                        <div class="step-vertical-icon">
                            @if ($status == 'active')
                                <div class="bg-white">
                                    <img src="{{ asset('images/doing-step.svg') }}" alt="Huidige stap"/>
                                </div>
                            @elseif ($status == 'complete')
                                <span
                                    class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-check2 fs-4 lh-1"></i>
                                </span>
                            @else
                                <span
                                    class="bg-light border border-2 border-secondary rounded-circle d-flex align-items-center justify-content-center p-2">
                                            <span class="bg-secondary rounded-circle p-2"></span>
                                        </span>
                            @endif
                        </div>

                        <div class="step-vertical-content">
                            <h4>{{ $step['label'] }}</h4>

                            @if ($status == 'active')
                                <p class="text-primary">Bezig</p>
                            @elseif ($status == 'complete')
                                <p class="text-success">Afgerond</p>
                            @else
                                <p>Te doen</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </aside>

        <main class="content flex-grow-1 px-5 py-4 overflow-y-auto overflow-x-hidden vh-100">
            {{ $slot }}
        </main>
    </div>
</x-layout>
