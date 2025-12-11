<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion - Répertoire Téléphonique</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-body p-4">
                        <h2 class="text-center mb-4">Connexion</h2>
                        
                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        
                        @if($errors->has('error'))
                            <div class="alert alert-danger">{{ $errors->first('error') }}</div>
                        @endif

                        <form action="{{ route('login.submit') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="identifiant" class="form-label">Identifiant</label>
                                <input type="text" 
                                       name="identifiant" 
                                       id="identifiant"
                                       class="form-control @error('identifiant') is-invalid @enderror" 
                                       value="{{ old('identifiant') }}"
                                       placeholder="admin"
                                       autofocus>
                                @error('identifiant')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="mot_de_passe" class="form-label">Mot de passe</label>
                                <input type="password" 
                                       name="mot_de_passe" 
                                       id="mot_de_passe"
                                       class="form-control @error('mot_de_passe') is-invalid @enderror"
                                       placeholder="abc">
                                @error('mot_de_passe')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Se connecter</button>
                        </form>

                        <div class="text-center mt-3">
                            <small class="text-muted">Identifiant: admin | Mot de passe: abc</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>