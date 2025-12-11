@extends('layouts.app')

@section('content')
<h1>Ajouter un contact</h1>

<form action="{{ route('contacts.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" placeholder="Nom et prénom" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone</label>
    <input type="text" name="telephone" class="form-control" placeholder="0123456789" required>

        @error('telephone')
            <div class="text-danger">{{ $message }}</div>
        @enderror       
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email (optionnel)</label>
        <input type="email" name="email" class="form-control" placeholder="test@example.com">
    </div>
    <button type="submit" class="btn btn-success">Enregistrer</button>
</form>
@endsection
