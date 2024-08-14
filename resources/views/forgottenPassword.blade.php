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
    <section class="container">
        <form action="{{ route('forgottenPassword.process') }}" method="POST">
            
            <a href="{{ route('login') }}">Retour</a>
            
            @csrf
            <h1>Mot de passe oublié</h1>

            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div class="error">{{ $message }}</div>
            @endif
    
            <label for="email">Email</label><br/>
            <input type="text" name="email" id="email" placeholder="Saisir l'email ici ...">
    
            <button type="submit">Soumettre</button>
        </form>
    </main>
</body>
</html>