<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Répertoire Téléphonique</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body class="container mt-4">
    <nav class="mb-4 d-flex justify-content-between align-items-center">
        <div>
            <a href="{{ route('contacts.index') }}" class="btn btn-primary">Accueil</a>
            <a href="{{ route('contacts.create') }}" class="btn btn-success">Ajouter un contact</a>
        </div>
        
        <div>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm">Déconnexion</button>
            </form>
        </div>
    </nav>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @yield('content')
</body>

</html>