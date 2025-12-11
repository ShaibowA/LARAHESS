@extends('layouts.app')

@section('content')
<h1>Modifier un contact</h1>

<form action="{{ route('contacts.update', $contact->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" name="nom" class="form-control" value="{{ $contact->nom }}" required>
    </div>
    <div class="mb-3">
        <label for="telephone" class="form-label">Téléphone</label>
        <input type="int" name="telephone" class="form-control" value="{{ $contact->telephone }}" required>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email (optionnel)</label>
        <input type="email" name="email" class="form-control" value="{{ $contact->email }}">
    </div>
    <button type="submit" class="btn btn-primary">Mettre à jour</button>
</form>
@endsection
