@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center">Gestion des Marques</h1>
        <!-- Button pour ouvrir modal pour la creation de marque -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createMarqueModal"><i class="fas fa-plus"></i>Ajouter une Marque</button>
    </div>
    
    <div class="letters text-center mb-5">
        @foreach (range('A', 'Z') as $char)
            <a href="{{ route('marques.index', ['letter' => $char]) }}" class="btn btn-secondary m-1">{{ $char }}</a>
        @endforeach
    </div>

    <div class="row">
        @foreach($marques as $marque)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $marque->nom }}</h5>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <!-- Trigger modal for editing -->
                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editMarqueModal-{{ $marque->id }}"><i class="fas fa-pen"></i> Modifier</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $marque->id }}').submit();">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                        <form id="delete-form-{{ $marque->id }}" action="{{ route('marques.destroy', $marque->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal pour modifier marque -->
            <div class="modal fade" id="editMarqueModal-{{ $marque->id }}" tabindex="-1" aria-labelledby="editMarqueModalLabel-{{ $marque->id }}" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editMarqueModalLabel-{{ $marque->id }}">Modifier Marque</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form action="{{ route('marques.update', $marque->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="nom" class="form-label">Nom de la marque</label>
        <input type="text" class="form-control" id="nom" name="nom" value="{{ $marque->nom }}" required>
    </div>
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Mettre à jour</button>
    </div>
</form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal pour ajouter nouvelle voiture -->
    <div class="modal fade" id="createMarqueModal" tabindex="-1" aria-labelledby="createMarqueModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createMarqueModalLabel">Ajouter une Nouvelle Marque</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('marques.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la marque</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" the class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
