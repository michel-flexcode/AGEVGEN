<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
    {{-- tutoriel https://laravel.sillo.org/cours-laravel-10-les-bases-envoyer-un-email/ --}}
    <h2>Prise de contact sur mon beau site</h2>
    <p>Réception d'une prise de contact avec les éléments suivants :</p>
    <ul>
        <li><strong>Nom</strong> : {{ $formData['name'] }}</li>
        {{-- <li><strong>Email</strong> : {{ $contact['email'] }}</li>
        <li><strong>Message</strong> : {{ $contact['message'] }}</li> --}}
    </ul>
</body>

</html>
