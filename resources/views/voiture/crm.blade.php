@extends('layouts.app')
@section('title', 'liste véhicules')
@section('content')

    <div class="row justify-content-center m-5">
        <div class="col-md-12">
            <div class="card mt-3">
            <form class="mb-3 p-2" data-js-filtre-crm>
            @csrf
        <div class="row">
            <div class="col-md-6">
                <select class="form-control" name="marque_id" id="selectMarque" data-js-marques>
                    <option value="">Selectionnez une marque</option>
                    @foreach($marques as $marque)
                      <option value="{{ $marque->id }}" {{ old('marque') == $marque->id ? 'selected' : '' }}>{{$marque->nom}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectModele" name="modele_id" data-js-modeles></select>
            </div>
            <div class="col-md-6">
                <input type="number" name="annee" class="form-control" id="inputAnnee" placeholder="Entrez une année">
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectKilometrage" name="kilometrage">
                  <option value="">Sélectionnez une marge de kilométrage</option>
                  <option value="0-20000">0 - 20000 km</option>
                  <option value="20000-50000">20000 - 50000 km</option>
                  <option value="50000-100000">50000 - 100000 km</option>
                  <option value="100000-10000000">100000 km et plus</option>
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectTransmission" name="transmission_id">
                    <option value="">Selectionnez un type de Transmission</option>
                    @foreach($transmissions as $transmission)
                      <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{$transmission->nom[app()->getLocale()]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectMotopropulseur" name="motopropulseur_id">
                    <option value="">Selectionnez un type de Motopropulseur</option>
                    @foreach($motopropulseurs as $motopropulseur)
                      <option value="{{ $motopropulseur->id }}" {{ old('motopropulseur_id') == $motopropulseur->id ? 'selected' : '' }}>{{$motopropulseur->nom[app()->getLocale()]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectCarburant" name="carburant_id">
                    <option value="">Selectionnez un type de Carburant</option>
                    @foreach($carburants as $carburant)
                      <option value="{{$carburant->id}}" {{ old('carburant_id') == $carburant->id ? 'selected' : '' }}>{{$carburant->nom[app()->getLocale()]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <select class="form-control" id="selectCouleur" name="couleur_id">
                    <option value="">Selectionnez une couleur</option>
                    @foreach($couleurs as $couleur)
                      <option value="{{$couleur->id}}" {{ old('couleur_id') == $couleur->id ? 'selected' : '' }}>{{$couleur->nom[app()->getLocale()]}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
              <button type="submit" class="btn btn-primary form-control" data-js-btn-filtre>Soumettre le filtre</button>
            </div>
        </div>
    </form>
                
                <div class="card-body">
                    <table class="table table-striped" data-js-table-liste-voiture>
                        <thead>
                            <th>Identifiant</th>
                            <th>Marque</th>
                            <th>Modele</th>
                            <th>Année</th>
                            <th>Prix</th>
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($voitures as $voiture)
                            <tr>
                                <th class="center-vertical">{{ $voiture->id }}</th>
                                <th class="center-vertical">{{ $voiture->modele->marque->nom }}</th>
                                <td class="center-vertical">{{ $voiture->modele->nom}}</td>
                                <th class="center-vertical">{{ $voiture->annee }}</th>
                                <td class="center-vertical">{{ $voiture->prixDeVente() }} $</td>
                                <td class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-sm btn-outline-success" href="{{ route('show.voiture', $voiture->id) }}">Afficher</a>
                                    <a class="btn btn-sm btn-outline-warning" href="{{ route('edit.voiture', $voiture->id) }}">Modifier</a>
                                    <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $voiture->id }}">Supprimer</button>
                                </td>
                              </tr>
                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  

    @foreach($voitures as $voiture)
  <div class="modal fade" id="deleteModal{{ $voiture->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $voiture->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel{{ $voiture->id }}">Suppression d'un véhicule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Êtes-vous sûr de vouloir supprimer la voiture : {{ $voiture->modele->marque->nom }} {{ $voiture->modele->nom }} ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">Annuler</button>
        <form action="{{ route('destroy.voiture', $voiture->id) }}" method="post">
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