<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>BlendBarometer</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container-fluid p-0 m-0 ">
        <div class="bg-white p-4 min-vh-100">
            <div class="mb-4">
                <h1 class="text-primary text-start  " style="font-size: 1.2rem;">{{ $title }}</h1>
                <p class="fs-1 fw-bold  ">{{ $smallDescription }}</p>
                <p class="text-muted">{{ $slot }}</p>
            </div>
            @php // for now the url is the same as the name so change it when a name is chosen
                $steps = [
                    ['label' => 'Gegevens', 'url' => '/information'],
                    ['label' => 'Les niveau', 'url' => '/lesson-level'],
                    ['label' => 'Module niveau', 'url' => '/module-level'],
                    ['label' => 'Overzicht & Resultaten', 'url' => '/results'],
                ];
                $status = 'done';
            @endphp
            <ul class="list-unstyled">
                @foreach ($steps as $index => $step)
                @php
                    if (Request::is(trim($step['url'], '/'))) {
                        $status = 'active'; 
                    }
                    elseif ($status == 'active') {
                        $status = 'to-do';
                    }
                @endphp
                <li class="mb-3 d-flex align-items-center">
                    @if ($status == 'active')
                        <div class="container-fluid d-flex align-items-center">
                            <img src="{{ asset('images/doingStep.svg') }}" alt="" class="" style="width: 30px; height: 35px;">
                            <div class="ms-3">
                                <p class="fw-bold m-0 fs-5">{{ $step['label'] }}</p>
                                <p class="text-primary m-0">Bezig</p>
                            </div>
                        </div>
                    @elseif ($status == 'done')
                        <div class="container-fluid d-flex align-items-center">
                            <span class="bg-primary text-white rounded-circle justify-content-center" style="width: 30px; height: 30px;">
                                <i class="bi bi-check2 fs-4"></i>
                            </span>
                            <div class="ms-3">
                                <p class="fw-bold m-0 fs-5">{{ $step['label'] }}</p>
                                <p class="text-success m-0">Afgerond</p>
                            </div>
                        </div>
                    @else
                        <div class="container-fluid d-flex align-items-center">
                            <span class="bg-light border border-2 border-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 30px; height: 30px;">
                                <span class="bg-secondary rounded-circle" style="width: 15px; height: 15px;"></span>
                            </span>
                            <div class="ms-3">
                                <p class="fw-bold m-0 fs-5">{{ $step['label'] }}</p>
                                <p class="m-0">Te doen</p>
                            </div>
                        </div>
                    @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</body>