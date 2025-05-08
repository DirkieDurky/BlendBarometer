<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <style>
        /* Inline CSS for email styling */
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .card {
            background: #fff;
            border: 1px solid #dee2e6;
            border-radius: 0.25rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        }

        .card-body {
            padding: 20px;
        }

        h1 {
            font-size: 1.75rem;
            color: #343a40;
            margin: 0;
        }

        h5 {
            color: #20c997;
        }

        p {
            color: #495057;
            line-height: 1.5;
        }

        ul {
            padding-left: 20px;
        }

        li {
            margin-bottom: 10px;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 0.25rem;
        }

        .mb-2 {
            margin-bottom: 0.5rem;
        }

        .my-10 {
            margin: 20px 0;
        }

        .text-muted {
            color: #6c757d;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card my-10">
            <div class="card-body">
                <table style="width: 100%; border-collapse: collapse;">
                    <tr>
                        <td style="width: 50px; vertical-align: middle;">
                            <img src="cid:logoCID" alt="Logo" style="display: block; max-width: 45px;">
                        </td>
                        <td style="vertical-align: middle; padding-left: 10px; padding-top: 5px;">
                            <h1 class="mb-2">Nieuwe BlendBarometer enquête</h1>
                        </td>
                    </tr>
                </table>
                <hr>
                <p>Beste Icto coach,</p>
                <p>Een nieuwe enquête over de kwaliteit van de cursus is ingediend op BlendBarometer.nl. Hieronder staan de details:</p>
                <ul>
                    <li><strong>Naam:</strong> {{ $name }}</li>
                    <li><strong>Email:</strong> {{ $emailParticipant }}</li>
                    <li><strong>Academie:</strong> {{ $academy }}</li>
                    <li><strong>Module:</strong> {{ $module }}</li>
                    <li><strong>Datum:</strong> {{ $date }}</li>
                </ul>
                <p><strong>Module Samenvatting:</strong> <br>{{ $summary }}</p>
                <br>
                <p>Het rapport staat in de bijlage van deze email.</p>
                <hr>
                <p>Met vriendelijke groet,</p>
                <p>De BlendBarometer website</p>
            </div>
        </div>
    </div>
</body>

</html>