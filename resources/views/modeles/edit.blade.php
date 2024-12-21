@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Modifier le Modèle</h1>
    <form method="POST" action="{{ route('modeles.update', $modele->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom du Modèle</label>
            <input type="text" class="form-control" id="nom" name="nom" value="{{ $modele->nom }}" required>
        </div>
        <div class="form-group">
            <label for="marque_id">Marque</label>
            <select class="form-control" id="marque_id" name="marque_id">
                @foreach(App\Models\Marque::all() as $marque)
                    <option value="{{ $marque->id }}" @if($marque->id === $modele->marque_id) selected @endif>{{ $marque->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection
