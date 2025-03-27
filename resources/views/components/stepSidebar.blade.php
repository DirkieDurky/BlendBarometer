<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BlendBarometer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="{{ asset('resources/css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div class="container-fluid p-0 m-0">
        <div class="bg-white p-4 min-vh-100">
            <div class="mb-4">
                <h1 class="text-primary text-start" style="font-size: 1.2rem;">{{ $title }}</h1>
                <p class="fs-1 fw-bold">{{ $smallDescription }}</p>
                <p class="text-muted">{{ $slot }}</p>
            </div>

            @php
                $steps = [
                    ['label' => 'Gegevens', 'url' => '/infrmation'],
                    ['label' => 'Les niveau', 'url' => '/information'],
                    ['label' => 'Module niveau', 'url' => '/module-level'],
                    ['label' => 'Overzicht & Resultaten', 'url' => '/results'],
                ];
                $status = 'complete';
            @endphp

            <div class="steps-vertical">
                @foreach ($steps as $index => $step)
                    @php
                        if (Request::is(trim($step['url'], '/'))) {
                            $status = 'active';
                        } elseif ($status == 'active') {
                            $status = 'to-do';
                        }
                    @endphp
                    <div class="step-vertical {{ $status }}">
                        <div class="step-vertical-icon">
                            @if ($status == 'active')
                                <img src="{{ asset('images/doingStep.svg') }}" alt="Active Step" style="width: 35px; height: 35px;">
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
                        <div class="step-vertical-content">
                            <h4>{{ $step['label'] }}</h4>
                            <p>
                                @if ($status == 'active')
                                    Bezig
                                @elseif ($status == 'complete')
                                    Afgerond
                                @else
                                    Te doen
                                @endif
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</body>

</html>
