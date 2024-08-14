<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
    <title>Authentification</title>
</head>
<body>
    <main class="container">
        <form action="{{ route('otpCode.process') }}" method="POST">
            @csrf
            <h1>Code de confirmation</h1>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div class="error">{{ $message }}</div>
            @endif

            <p>
                Un code de confirmation a été envoyé à votre adresse e-mail. Saisisez-le dans le champs pour continuer.
            </p>
    
            <label for="code">Code de confirmation</label>
            <input type="hidden" name="email" id="email" value="{{ session()->get('email') }}"/>
            <input type="text" name="code" id="code" placeholder="Saisir le code ici ...">
    
            <button type="submit">Soumettre</button>
        </form>
    </main>
</body>
</html>