@extends('layouts.app')
@section('title', 'Se connecter')
@section('content')

    <div class="row justify-content-center m-5">

        @if(!$errors->isEmpty())
        <div class="alert alert-danger alert-dismissible fade show mt-4 w-50" role="alert">
          <ul class="m-0">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
          </ul>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="col-md-12">
            <h3 class="mb-5">Gestion Des carburants</h3>
            <div class="scrollbar-custom shadow rounded">
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Nom en Francais</th>
                        <th>Nom en anglais</th>
                        <th>Date de création</th>
                        <th>Date de la mise a jour</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($carburants as $carburant)
                        <tr>
                            <th class="center-vertical">{{ $carburant->id }}</th>
                            <th class="center-vertical">{{ $carburant->nom['fr'] }}</th>
                            <th class="center-vertical">{{ $carburant->nom['en'] }}</th>
                            <th class="center-vertical">{{ $carburant->created_at }}</th>
                            <th class="center-vertical">{{ $carburant->updated_at }}</th>
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('carburant.edit', $carburant->id) }}">Modifier</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $carburant->id }}">Supprimer</button>
                            </td>
                        </tr>
                        @endforeach        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row justify-content-center m-5">
        <div class="col-md-12">
            <div class="add-brand shadow rounded">
                <h3 class="p-4">Insertion D'un Carburant</h3>
                <form method="post" Action="{{ route('carburant.store') }}" class="p-4">
                @csrf
                    <div class="mb-4">
                      <label for="carburant_fr" class="form-label mb-4">Carburant en Francais</label>
                      <input type="text" name="carburant_fr" class="form-control" id="carburant_fr"  placeholder="Entrez le nom du carburant en francais" value="{{ old('carburant_fr')}}">
                    </div>
                    <div class="mb-4">
                      <label for="carburant_en" class="form-label mb-4">Carburant en Anglais</label>
                      <input type="text" name="carburant_en" class="form-control" id="carburant_en"  placeholder="Entrez le nom du carburant en anglais" value="{{ old('carburant_en')}}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Soummettre</button>
                </form>
            </div>
        </div>
    </div>

    @foreach($carburants as $carburant)
  <div class="modal fade" id="deleteModal{{ $carburant->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $carburant->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel{{ $carburant->id }}">Suppression d'une marque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer le modele : {{ $carburant->nom['fr'] }} ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('carburant.destroy', $carburant->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach






@endsection