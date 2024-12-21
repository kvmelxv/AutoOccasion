@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center">Gestion des Carburants</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCarburantModal">
            <i class="fas fa-plus"></i> Ajouter un Carburant
        </button>
    </div>

    <div class="row">
        @foreach($carburants as $carburant)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">{{ $carburant->nom }}</h5>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editCarburantModal-{{ $carburant->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $carburant->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <form id="delete-form-{{ $carburant->id }}" action="{{ route('carburants.destroy', $carburant->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <!-- Modal pour modifier un carburant -->
                <div class="modal fade" id="editCarburantModal-{{ $carburant->id }}" tabindex="-1" aria-labelledby="editCarburantModalLabel-{{ $carburant->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editCarburantModalLabel-{{ $carburant->id }}">Modifier Carburant</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('carburants.update', $carburant->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom du carburant</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $carburant->nom }}" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Mettre à jour</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Modal pour ajouter un nouveau carburant -->
    <div class="modal fade" id="createCarburantModal" tabindex="-1" aria-labelledby="createCarburantModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCarburantModalLabel">Ajouter un Nouveau Carburant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('carburants.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom du carburant</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function confirmDelete(id) {
    if(confirm('Êtes-vous sûr de vouloir supprimer ce carburant ?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
