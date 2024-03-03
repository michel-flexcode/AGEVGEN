<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
</head>

<body>
    {{-- tutoriel https://laravel.sillo.org/cours-laravel-10-les-bases-envoyer-un-email/ --}}
    <h2>Votre avis compte !</h2>
    <p>Formulaire numéro : {{ $formulaireNum }}</p>
    <p>Donnez votre avis sur le cours ifosup en vous rendant sur le lien de ce mail :</p>
    <ul>
        <li><a href="<?php echo $formData; ?>">Cliquez sur ce lien</a></li>
    </ul>

</body>

</html>


{{-- <li><strong>Cours</strong> : {{ $formData['url'] }}</li> --}}
{{-- <li><a href="/reponse">Cliquez sur ce lien</a></li>
        <li><a href=$formData>Cliquez sur ce lien</a></li>

        {{-- <li><strong>lien</strong> : {{ $formData['link'] }}</li> --}}
{{-- Inclure l'ID du formulaire dans l'URL --}}
{{-- <li><a href="{{ route('answers.show', ['id' => $formulaireId]) }}">Cliquez sur ce lien</a></li> --}}
{{-- <li><a href="{{ route('answers.show', ['id' => $formulaireNum]) }}">Cliquez sur ce lien</a></li> --}}

{{-- <li><a href="{{ $url }}">Cliquez sur ce lien</a></li>
        <p><a href="{{ $url }}">Cliquez sur ce lien</a></p> --}}


{{-- <li><a href="{{ $formData['url'] }}">Cliquez sur ce lien</a></li>
        <p><a href="{{ $formData['url'] }}">Cliquez sur ce lien</a></p> --}}


{{-- <li><a href="{{ $formData }}">Cliquez sur ce lien</a></li>
        <p>FONCTIONNE AVEC FUNCTION SEND 3href="{{ $formData }}</p> --}}

{{-- <li><a href="{{ route('answers.index') }}">Cliquez sur ce lien</a></li>
        <p>href="{{ route('answers.index') }}</p> --}}

{{-- <li><a href="{{ route('answers.show/$id') }}">Cliquez
                sur ce lien</a></li>
        <p>href={{ route('answers.show/$id') }}</p> --}}

{{-- <li><a href="{{ $formData['url'] }}">Cliquez sur ce lien</a></li> --}}

{{-- <li>Contenu de $formData : <php print_r($formData); ?></li> --}}
