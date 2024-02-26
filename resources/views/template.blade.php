<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mon joli site</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        textarea {
            resize: none;
        }

        .card {
            width: 25em;
        }
    </style>
</head>

<body>
    {{-- tutoriel : https://laravel.sillo.org/cours-laravel-10-les-bases-la-validation/ --}}
    @yield('contenu')
</body>

</html>
