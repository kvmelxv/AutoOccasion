@extends('layouts.app')
@section('title', 'Ajout véhicule')
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
 
 <!-- Inscription Form section -->
  <section class="register-section py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6 w-100">
          
          <form method="POST" action="{{ route('store.voiture') }}" enctype="multipart/form-data">
          @csrf
          <div class="row gx-2 mb-3 rounded">

            <div class="col-md-6">
              <!-- Description en -->
              <div class="mb-3">
                <label for="description_en" class="form-label color-label">Description en Anglais</label>
                <textarea class="form-control custom-textarea" name="description_en" placeholder="Description maximal de 250 caracteres.">{{ old('description_en') }}</textarea>
              </div>  
            </div>

            <div class="col-md-6">
              <!-- Description fr -->
              <div class="mb-3">
                <label for="description_fr" class="form-label color-label">Description en Francais</label>
                <textarea class="form-control custom-textarea" name="description_fr" placeholder="Description maximal de 250 caracteres.">{{ old('description_fr') }}</textarea>
              </div> 
            </div> 
          </div>

          <!-- Autres champs -->
          <div class="row gx-2 mb-3 rounded">
            <!-- Date, prix, année et kilométrage -->
            <div class="col-md-3">
              <!-- Date d'arrivée -->
              <div class="mb-3">
                <label for="date_arrivee"  class="form-label color-label">Date d'arrivée</label>
                <input type="date" class="form-control" id="date_arrivee" name="date_arrivee"  placeholder="" value="{{ old('date_arrivee')}}">
              </div>
            </div>

            <div class="col-md-3">
              <!-- Prix payé -->
              <div class="mb-3">
                <label for="prix_payee" class="form-label color-label">Prix Payé</label>
                <input type="text" class="form-control"  id="prix_payee" name="prix_payee" placeholder="" value="{{ old('prix_payee')}}">
              </div>
            </div>

            <div class="col-md-3">
              <!-- Année -->
              <div class="mb-3">
                <label for="annee" class="form-label color-label">Année</label>
                <input type="number" name="annee" class="form-control" id="annee"  placeholder="" value="{{ old('annee')}}">
              </div>
            </div>

            <div class="col-md-3">
              <!-- Kilométrage -->
              <div class="mb-3">
                <label for="kilometrage" class="form-label color-label">kilometrage</label>
                <input type="number" class="form-control" name="kilometrage" id="kilometrage" placeholder="" value="{{ old('kilometrage')}}">
              </div>
            </div>
          </div>

          <!-- Sélection des options -->
          <div class="row gx-2 mb-3 rounded">
            <!-- Marque -->
            <div class="col-md-4">
              <div class="mb-3" data-js-marque>
                <label for="marque" class="form-label color-label">Marque</label>
                <select class="form-control" placeholder="" id="marque" name="marque" value="{{ old('marque')}}">
                  <option value="" selected disabled>Selectionnez une Marque</option>
                  @foreach($marques as $marque)
                    <option value="{{ $marque->id }}" {{ old('marque') == $marque->id ? 'selected' : '' }}>{{$marque->nom}}</option>
                  @endforeach
                </select>            
              </div>
            </div>
            
            <!-- Modele -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="modele_id" class="form-label color-label">Modele</label>
                <select class="form-control" placeholder="" id="modele_id" name="modele_id" value="{{ old('modele_id')}}">
                  <option value="" selected disabled>Selectionnez D'abord une Marque</option>
                </select>            
              </div>
            </div>

            <!-- Motopropulseur -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="motopropulseur_id" class="form-label color-label" >Groupe Motopropulseurs</label>
                <select class="form-control" placeholder="" id="motopropulseur_id" name="motopropulseur_id" value="{{ old('motopropulseur_id')}}">
                  <option value="" selected disabled>Selectionnez un Groupe Motopropulseur</option>
                  @foreach($motopropulseurs as $motopropulseur)
                    <option value="{{ $motopropulseur->id }}" {{ old('motopropulseur_id') == $motopropulseur->id ? 'selected' : '' }}>{{$motopropulseur->nom[app()->getLocale()]}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <!-- Carburant -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="carburant_id" class="form-label color-label">Carburant</label>
                <select class="form-control"  placeholder="" name="carburant_id" id="carburant_id" value="{{ old('carburant_id')}}">
                  <option value="" selected disabled>selectionnez un Carburant</option>
                  @foreach($carburants as $carburant)
                    <option value="{{$carburant->id}}" {{ old('carburant_id') == $carburant->id ? 'selected' : '' }}>{{$carburant->nom[app()->getLocale()]}}</option>
                  @endforeach
                </select>            
              </div>
            </div>

            <!-- Transmission -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="transmission_id" class="form-label color-label">Transmission</label>
                <select class="form-control"  placeholder="" name="transmission_id" id="transmission_id" value="{{ old('transmission_id')}}">
                  <option value="" selected disabled>selectionnez une Transmission</option>
                  @foreach($transmissions as $transmission)
                    <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{$transmission->nom[app()->getLocale()]}}</option>
                  @endforeach
                </select>   
              </div>         
            </div>

            <!-- Couleur -->
            <div class="col-md-4">
              <div class="mb-3">
                <label for="couleur_id" class="form-label color-label">Couleur</label>
                <select class="form-control"  placeholder="" name="couleur_id" id="couleur_id" value="{{ old('couleur_id')}}">
                  <option value="" selected disabled>selectionnez une Couleur</option>
                  @foreach($couleurs as $couleur)
                    <option value="{{$couleur->id}}" {{ old('couleur_id') == $couleur->id ? 'selected' : '' }}>{{$couleur->nom[app()->getLocale()]}}</option>
                  @endforeach
                </select>  
              </div>          
            </div>

            <div class="mb-3">
              <label for="photo" class="form-label color-label">Photos</label>
              <input type="file" class="form-control"  id="photo" name="photo[]" placeholder="" multiple value="{{ old('photo[]')}}">
            </div>

            <button type="submit" class="btn btn-primary">Enregistrez</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.">

@endsection