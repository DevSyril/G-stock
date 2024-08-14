<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ URL::asset('assets/style.css') }}">
    <title>Authentication</title>
</head>

<body>
    <main class="container">
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            <h1>Connexion</h1>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif

            @if ($message = Session::get('error'))
                <div class="error">{{ $message }}
            @endif

            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Saisir l'email ici ...">

            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password"
                placeholder="Saisir le mot de passe ici ...">

            <div style="display: flex; justify-content: space-between; width: 100%; padding: 0">
                <a href="{{ route('registration') }}">S'inscrire</a>
                <a href="{{ route('forgottenPassword') }}">Mot de passe oublié ?</a>
            </div>

            <button type="submit">Soumettre</button>
        </form>
    </main>
</body>

</html>
