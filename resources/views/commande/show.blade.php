@extends('layouts.app')
@section('title', 'Commande')
@section('content')

<!--  errors show-->
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif


<div class="container p-4">
    <div class="row justify-content-center p-4">
        <div class="col-md-10">
            <!-- student Information -->
            <div class="card user-info-card shadow">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Details de la Commande <strong>#{{$commande->id}}</strong></h5>
                    <ul class="list-group list-group-flush">

                    <h5 class="card-title"></h5>
                        <li class="list-group-item"><strong>Date  :</strong>  {{ $commande->date }}</li>
                        <li class="list-group-item"><strong>Statut  :</strong>  {{ $commande->statut->nom }}</li>
                        <li class="list-group-item"><strong>Client :</strong> {{ $commande->user->prenom }} {{ $commande->user->name }}</li>
                        <li class="list-group-item"><strong>Voiture :</strong>
                            <ul>
                            @foreach($voitures as $voiture)
                            @if($voiture->commande_id == $commande->id)
                                <li> {{ $voiture->modele->marque->nom . ' ' . $voiture->modele->nom . ' ' . $voiture->annee }}
                                @endif
                                @endforeach
                            </ul>   
                        </li>
                        <li class="list-group-item"><strong>Somme :</strong>  {{ number_format($commande->prix_total) }} $</li>
                        <li class="list-group-item"><strong>Mode de Paiement :</strong> {{ $commande->modePaiement->nom }}</li>
                        <li class="list-group-item"><strong>Adresse d'éxpedition:</strong> {{$commande->expedition->adresses->num_rue}}, {{$commande->expedition->adresses->code_postal}} {{$commande->expedition->adresses->villes->nom_ville}}, 
                        {{$commande->expedition->adresses->villes->provinces->nom_province}}, {{$commande->expedition->adresses->villes->provinces->pays->nom_pays}}</li>
                        <li class="list-group-item"><strong>Type d'éxpedition :</strong>  {{$commande->expedition->type}}</li>
                        <li class="list-group-item"><strong>Date d'éxpedition prévue :</strong>  {{$commande->expedition->date}}</li>
                    </ul>
                </div>
            </div>
            <div class="card-footer mt-2">
                <div class="col-md-12">
                    <div class="col-md-12 align-middle">
                        <form action="{{ route('commande.updateStatut', $commande->id) }}" method="POST" class="row align-items-center">
                        @csrf
                        @method('PUT')

                        <div class="col-md-6">
                            <select class="form-select" id="statut" name="statut_id">
                                <option value="">Statuts</option>
                                @foreach($statuts as $statut)
                                    <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <input type="submit" class="btn btn-sm btn-success w-100 mt-1" value="Valider">
                        </div>
                        </form>
                    </div>
                    <div class="col-md-6 m-auto">
                        <a href="{{ route('commande.pdf', $commande->id) }}" class="btn btn-sm btn-light border w-100 mt-1">Facturer</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger " id="editModal">Confirmation de Suppréssion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sur de vouloir suppriemr votre compte  ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">annuler</button>
        <form action="#" method="put">
            @csrf
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection