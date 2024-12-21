@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-center">Gestion des Transmissions</h1>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createTransmissionModal">
            <i class="fas fa-plus"></i> Ajouter une Transmission
        </button>
    </div>

    <div class="row">
        @foreach($transmissions as $transmission)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">{{ $transmission->nom }}</h5>
                        <div>
                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editTransmissionModal-{{ $transmission->id }}">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete({{ $transmission->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <form id="delete-form-{{ $transmission->id }}" action="{{ route('transmissions.destroy', $transmission->id) }}" method="POST" style="display: none;">
                    @csrf
                    @method('DELETE')
                </form>

                <!-- Modal pour modifier une transmission -->
                <div class="modal fade" id="editTransmissionModal-{{ $transmission->id }}" tabindex="-1" aria-labelledby="editTransmissionModalLabel-{{ $transmission->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editTransmissionModalLabel-{{ $transmission->id }}">Modifier Transmission</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('transmissions.update', $transmission->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nom" class="form-label">Nom de la transmission</label>
                                        <input type="text" class="form-control" id="nom" name="nom" value="{{ $transmission->nom }}" required>
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

    <!-- Modal pour ajouter une nouvelle transmission -->
    <div class="modal fade" id="createTransmissionModal" tabindex="-1" aria-labelledby="createTransmissionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createTransmissionModalLabel">Ajouter une Nouvelle Transmission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transmissions.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de la transmission</label>
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
    if(confirm('Êtes-vous sûr de vouloir supprimer cette transmission ?')) {
        document.getElementById('delete-form-' + id).submit();
    }
}
</script>
@endsection
