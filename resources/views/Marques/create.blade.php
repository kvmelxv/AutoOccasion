@extends('layouts.app')

@section('title', 'Ajouter une Marque')

@section('content')
<div class="container mt-5">
    <h2>Ajouter une Nouvelle Marque</h2>
    <form action="{{ route('marques.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nom" class="form-label">Nom de la Marque</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</div>
@endsection
