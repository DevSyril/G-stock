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
        <form action="{{ route('registration.process') }}" method="POST">
            @csrf
    
            <h1>Inscription</h1>
    
            @if ($errors->any())
                <ul class="alert alert-danger">
                    {!! implode('', $errors->all('<li>:message</li>')) !!}
                </ul>
            @endif
    
            @if ($message = Session::get('error'))
                <div>{{ $message }}</div><br />
            @endif
    
            <label for="email">Nom d'utilisateur</label>
            <input type="text" name="name" id="name" placeholder="Saisir le nom ici ...">
    
            <label for="email">Email</label><br />
            <input type="text" name="email" id="email" placeholder="Saisir l'email ici ..."><br /><br />
    
            <label for="password">Mot de passe</label><br />
            <input type="password" name="password" id="password" placeholder="Saisir le mot de passe ici ...">
            
            <label for="passwordConfirm">Mot de passe</label><br />
            <input type="password" name="passwordConfirm" id="passwordConfirm" placeholder="Confirmer le mot de passe ici ...">
    
            <a href="{{ route('login') }}">Se connecter</a>
    
            <button type="submit">Soumettre</button>
        </form>
    </main>
</body>

</html>
