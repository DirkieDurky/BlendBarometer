@props(['title', 'smallDescription', 'current_step_name'])
<x-layout>
    <div class="container-fluid p-0 m-0">
        <div class="bg-white p-4 min-vh-100">
            <div class="mb-4">
                <img src="{{ asset('images/Logo.svg') }}" alt="BlendBarometer" class="my-4">
                <h1 class="text-primary text-start" style="font-size: 1.2rem;">{{ $title }}</h1>
                <p class="fs-1 fw-bold">{{ $smallDescription }}</p>
                <p class="text-muted">{{ $slot }}</p>
            </div>

            {{-- when making the ui for the other steps just change the name value and pass it on when using the component --}}
            @php
                $steps = [
                    ['label' => 'Gegevens', 'name' => 'information'],
                    ['label' => 'Les niveau', 'name' => 'tempname'],
                    ['label' => 'Module niveau', 'name' => 'tempname'],
                    ['label' => 'Overzicht & Resultaten', 'name' => 'tempname'],
                ];
                $status = 'complete';
            @endphp

            <div class="steps-vertical">
                @foreach ($steps as $index => $step)
                    @php
                        if ($current_step_name == $step['name']) {
                            $status = 'active';
                        } elseif ($status == 'active') {
                            $status = 'to-do';
                        }
                    @endphp
                    <div class="step-vertical {{ $status }} d-flex flex-row">
                        <div class="step-vertical-icon">
                            @if ($status == 'active')
                                <img src="{{ asset('images/doing-step.svg') }}" alt="Active Step" style="width: 35px; height: 35px;">
                            @elseif ($status == 'complete')
                                <span class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                    <i class="bi bi-check2 fs-4"></i>
                                </span>
                            @else
                                <span class="bg-light border border-2 border-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                    <span class="bg-secondary rounded-circle" style="width: 15px; height: 15px;"></span>
                                </span>
                            @endif
                        </div>
                        <div class="step-vertical-content d-flex flex-column">
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
        </div>
    </div>
</x-layout>

