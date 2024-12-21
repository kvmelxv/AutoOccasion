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
            <h3 class="mb-5">Gestion Des Modeles</h3>
            <div class="scrollbar-custom shadow rounded">
                <table class="table table-striped">
                    <thead>
                        <th>Id</th>
                        <th>Nom</th>
                        <th>Marque</th>
                        <th>Date de création</th>
                        <th>Date de la mise a jour</th>
                        <th class="text-center">Action</th>
                    </thead>
                    <tbody>
                        @foreach($modeles as $modele)
                        <tr>
                            <th class="center-vertical">{{ $modele->id }}</th>
                            <th class="center-vertical">{{ $modele->nom }}</th>
                            <th class="center-vertical">{{ $modele->marque->nom }}</th>
                            <th class="center-vertical">{{ $modele->created_at }}</th>
                            <th class="center-vertical">{{ $modele->updated_at }}</th>
                            <td class="d-flex gap-2 justify-content-center">
                                <a class="btn btn-sm btn-outline-warning" href="{{ route('modele.edit', $modele->id) }}">Modifier</a>
                                <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $modele->id }}">Supprimer</button>
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
                <h3 class="p-4">Insertion D'un Modele</h3>
                <form method="post" Action="{{ route('modele.store') }}" class="p-4">
                @csrf
                    <div class="mb-4">
                      <label for="name" class="form-label mb-4">Modele</label>
                      <input type="text" name="nom" class="form-control" id="name"  placeholder="Entrez le nom du modele" value="{{ old('nom')}}">
                    </div>
                    <div class="mb-4">
                        <select class="form-control" id="selectMotopropulseur" name="marque_id">
                          <option value="">Selectionnez la marque</option>
                          @foreach($marques as $marque)
                            <option value="{{ $marque->id }}" {{ old('marque_id') == $marque->id ? 'selected' : '' }}>{{$marque->nom}}</option>
                          @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Soummettre</button>
                </form>
            </div>
        </div>
    </div>

@foreach($modeles as $modele)
  <div class="modal fade" id="deleteModal{{ $modele->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $modele->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel{{ $modele->id }}">Suppression d'une marque</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer le modele : {{ $modele->nom }} ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('modele.destroy', $modele->id) }}" method="post">
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