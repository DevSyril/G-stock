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
    <main class="dash">
        <table>
            <tbody>
                <tr>
                    <td class="">
                        <h1>Tableau de bord</h1>
                    </td>
                    <td>
                        <a href="{{ route('logout') }}">
                            Se déconnecter
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <h3>Bienvenue {{ Auth::user()->name }}</h3>
    </main>
</body>
</html>