@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Ajouter un Nouveau Modèle</h1>
    <form method="POST" action="{{ route('modeles.store') }}">
        @csrf
        <div class="form-group">
            <label for="nom">Nom du Modèle</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="marque_id">Marque</label>
            <select class="form-control" id="marque_id" name="marque_id">
                @foreach(App\Models\Marque::all() as $marque)
                    <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
