@extends('layouts.app')
@section('title', 'Liste des Commande')
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

<div class="container p-5">

    <!-- Filtrer -->
<form action="{{ route('commandes.filter') }}" class="m-4">
    <h4 class="mb-4">Filtre Des Commandes</h4>
    @csrf
    <div class="row">
        <div class="col-md-4 mb-2">
            <label for="commande_id" class="form-label">ID de la commande</label>
            <input type="text" class="form-control" id="commande_id" name="commande_id">
        </div>
        <div class="col-md-4 mb-2">
            <label for="client_name" class="form-label">Nom du client</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
        </div>
        <div class="col-md-4 mb-2">
            <label for="statut" class="form-label">Statut</label>
            <select class="form-select" id="statut" name="statut">
                <option value="">Sélectionner un statut</option>
                @foreach($statuts as $statut)
                <option value="{{ $statut->id }}">{{ $statut->nom }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-12 mb-2">
            <button type="submit" class="btn btn-primary w-100">Filtrer</button>
        </div>
    </div>
</form>
    <div class="row justify-content-center m-2">
        <div class="col-md-12">
            <div class="card mt-3">
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <th>#ID</th>
                            <th>Client</th>
                            <th>Prix Total</th>
                            <th>Mode de paiement</th>
                            <th>Statut</th>>
                            
                            <th class="text-center">Action</th>
                        </thead>
                        <tbody>
                            @foreach($commandes as $commande)
                            <tr>
                                <th>{{ $commande->id }}</th>
                                <td>{{ $commande->user->prenom }} {{ $commande->user->name }}</td>
                                <td><strong>{{ number_format($commande->prix_total) }} $</strong></td>
                                <td>{{ $commande->modePaiement->nom }} </td>
                                <td> {{ $commande->statut->nom }} </td>

                                <td class="d-flex gap-2 justify-content-center">
                                    <a class="btn btn-sm btn-outline-success " href="{{route('commande-crm.show', $commande->id)}}" title='Afficher'><i class="fa-solid fa-eye" ></i></a>
                                </td>
                                

                            @endforeach        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>  

</div>



  @endsection

