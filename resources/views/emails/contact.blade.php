<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
    {{-- tutoriel https://laravel.sillo.org/cours-laravel-10-les-bases-envoyer-un-email/ --}}
    <h2>Votre avis compte !</h2>
    <p>Donnez votre avis sur le cours ifosup en vous rendant sur le lien de ce mail :</p>
    <ul>
        {{-- <li><strong>Cours</strong> : {{ $formData['url'] }}</li> --}}
        {{-- <li><a href="/reponse">Cliquez sur ce lien</a></li>
        <li><a href=$formData>Cliquez sur ce lien</a></li>
        <li><strong>lien</strong> : {{ $formData['link'] }}</li> --}}
        <li><a href="{{ route('answers.index') }}">Cliquez sur ce lien</a></li>
    </ul>
</body>

</html>
