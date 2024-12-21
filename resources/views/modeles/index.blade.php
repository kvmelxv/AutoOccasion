@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center">Gestion des Modèles</h1>
        <!-- Button pour ouvrir modal pour la creation de modèle -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModeleModal" ><i class="fas fa-plus"></i>Ajouter un Modèle</button>
    </div>
    
    <div class="letters text-center mb-5">
        @foreach (range('A', 'Z') as $char)
            <a href="{{ route('modeles.index', ['letter' => $char]) }}" class="btn btn-secondary m-1">{{ $char }}</a>
        @endforeach
    </div>

    <div class="row">
        @foreach($modeles as $modele)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow">
                    <div class="card-body">
                        <h5 class="card-title">{{ $modele->nom }}</h5>
                        <p class="card-text"><strong>Marque :</strong> {{ $modele->marque->nom }}</p>
                    </div>
                    <div class="card-footer bg-transparent border-0">
                        <!-- Trigger modal for editing -->
                        <button class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#editModeleModal-{{ $modele->id }}"><i class="fas fa-pen"></i> Modifier</button>
                        <button class="btn btn-outline-danger btn-sm" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $modele->id }}').submit();">
                            <i class="fas fa-trash"></i> Supprimer
                        </button>
                        <form id="delete-form-{{ $modele->id }}" action="{{ route('modeles.destroy', $modele->id) }}" method="POST" style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>

<!-- Modal pour modifier modèle -->
<div class="modal fade" id="editModeleModal-{{ $modele->id }}" tabindex="-1" aria-labelledby="editModeleModalLabel-{{ $modele->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModeleModalLabel-{{ $modele->id }}">Modifier Modèle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('modeles.update', $modele->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom du modèle</label>
                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $modele->nom }}" required>

                        <label for="marque" class="form-label">Marque</label>
                        <!-- Display only the current marque's name as a read-only field -->
                        <input type="text" class="form-control" id="marque" name="marque" value="{{ $modele->marque->nom }}" readonly>
                        <!-- Hidden field to store marque_id -->
                        <input type="hidden" name="marque_id" value="{{ $modele->marque_id }}">
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

    <!-- Modal pour ajouter nouveau modèle -->
    <div class="modal fade" id="createModeleModal" tabindex="-1" aria-labelledby="createModeleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div the="modal-header">
                    <h5 class="modal-title" id="createModeleModalLabel">Ajouter un Nouveau Modèle</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('modeles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du modèle</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                            <label for="marque_id" class="form-label">Marque</label>
                            <select class="form-control" id="marque_id" name="marque_id">
                                @foreach($marques as $marque)
                                    <option value="{{ $marque->id }}">{{ $marque->nom }}</option>
                                @endforeach
                            </select>
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
