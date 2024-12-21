@extends('layouts.app')
@section('title', 'modification véhicule')
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

        <!-- Images à modifier -->
        <div class="edit-img mb-3">
            @csrf
            <!-- Boucle pour chaque image -->
            @foreach($voiture->photos as $photo)
            <div class="container-img-edit">
                <img src="{{ asset('storage/' . $photo->path) }}" alt="Product Image">
                <button class="btn-delete" data-photo-id="{{ $photo->id }}">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" height="20" viewBox="0 -960 960 960" width="20">
                        <path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/>
                    </svg>
                </button>
            </div>
            @endforeach
        </div>

    <form method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="row gx-2 mb-3 rounded">
            <div class="col-md-6">
                <!-- Description en -->
                <div class="mb-3">
                    <label for="description_en" class="form-label color-label">Description Anglais</label>
                    <textarea class="form-control custom-textarea" name="description_en" placeholder="">{{ old('description', $voiture->description['en']) }}</textarea>
                </div>
            </div>

            <div class="col-md-6">
                <!-- Description fr -->
                <div class="mb-3">
                    <label for="description_fr" class="form-label color-label">Description Francais</label>
                    <textarea class="form-control custom-textarea" name="description_fr" placeholder="">{{ old('description', $voiture->description['fr']) }}</textarea>
                </div>
            </div>
        </div>

        <!-- Autres champs -->
        <div class="row gx-2 mb-3 rounded">
            <!-- Date, prix, année et kilométrage -->
            <div class="col-md-3">
                <!-- Date d'arrivée -->
                <div class="mb-3">
                    <label for="date_arrivee" class="form-label color-label">Date d'arrivée</label>
                    <input type="date" class="form-control" id="date_arrivee" name="date_arrivee" placeholder="" value="{{ old('date_arrivee', $voiture->date_arrivee) }}">
                </div>
            </div>

            <div class="col-md-3">
                <!-- Prix payé -->
                <div class="mb-3">
                    <label for="prix_payee" class="form-label color-label">Prix Payé</label>
                    <input type="text" class="form-control" id="prix_payee" name="prix_payee" placeholder="" value="{{ old('prix_payee', $voiture->prix_payee) }}">
                </div>
            </div>

            <div class="col-md-3">
                <!-- Année -->
                <div class="mb-3">
                    <label for="annee" class="form-label color-label">Année</label>
                    <input type="text" name="annee" class="form-control" id="annee" placeholder="" value="{{ old('annee', $voiture->annee) }}">
                </div>
            </div>

            <div class="col-md-3">
                <!-- Kilométrage -->
                <div class="mb-3">
                    <label for="kilometrage" class="form-label color-label">Kilométrage</label>
                    <input type="text" class="form-control" name="kilometrage" id="kilometrage" placeholder="" value="{{ old('kilometrage', $voiture->kilometrage) }}">
                </div>
            </div>
        </div>

        <!-- Sélection des options -->
        <div class="row gx-2 mb-3 rounded">
            <!-- Marque -->
            <div class="col-md-4">
                <div class="mb-3" data-js-marque>
                    <label for="marque" class="form-label color-label">Marque</label>
                    <select class="form-control" placeholder="" id="marque" name="marque" value="{{ old('marque') }}">
                        <option value="" selected disabled>---Sélectionnez une Marque---</option>
                        <!-- Boucle pour chaque marque -->
                        @foreach($marques as $marque)
                            <option value="{{ $marque->id }}" {{ $voiture->modele->marque_id == $marque->id ? 'selected' : '' }}>{{ $marque->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Modele -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="modele_id" class="form-label color-label">Modèle</label>
                    <select class="form-control" placeholder="" id="modele_id" name="modele_id" value="{{ old('modele_id') }}">
                        <option value="" selected disabled>---Sélectionnez un Modèle---</option>
                        <!-- Boucle pour chaque modèle -->
                        @foreach($modeles as $modele)
                            <option value="{{ $modele->id }}" {{ $voiture->modele_id == $modele->id ? 'selected' : '' }}>{{ $modele->nom }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Transmission -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="transmission_id" class="form-label color-label">Transmission</label>
                    <select class="form-control" placeholder="" id="transmission_id" name="transmission_id" value="{{ old('transmission_id') }}">
                        <option value="" selected disabled>---Sélectionnez une Transmission---</option>
                        <!-- Boucle pour chaque transmission -->
                        @foreach($transmissions as $transmission)
                            <option value="{{ $transmission->id }}" {{ $voiture->transmission_id == $transmission->id ? 'selected' : '' }}>{{ $transmission->nom[app()->getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Autres sélections -->
        <div class="row gx-2 mb-3 rounded">
            <!-- Motopropulseur -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="motopropulseur_id" class="form-label color-label">Motopropulseur</label>
                    <select class="form-control" placeholder="" id="motopropulseur_id" name="motopropulseur_id" value="{{ old('motopropulseur_id') }}">
                        <option value="" selected disabled>---Sélectionnez un Groupe de Motopropulseur---</option>
                        <!-- Boucle pour chaque motopropulseur -->
                        @foreach($motopropulseurs as $motopropulseur)
                            <option value="{{ $motopropulseur->id }}" {{ $voiture->motopropulseur_id == $motopropulseur->id ? 'selected' : '' }}>{{ $motopropulseur->nom[app()->getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Carburant -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="carburant_id" class="form-label color-label">Carburant</label>
                    <select class="form-control" placeholder="" id="carburant_id" name="carburant_id" value="{{ old('carburant_id') }}">
                        <option value="" selected disabled>---Sélectionnez un Carburant---</option>
                        <!-- Boucle pour chaque carburant -->
                        @foreach($carburants as $carburant)
                            <option value="{{ $carburant->id }}" {{ $voiture->carburant_id == $carburant->id ? 'selected' : '' }}>{{ $carburant->nom[app()->getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Couleur -->
            <div class="col-md-4">
                <div class="mb-3">
                    <label for="couleur_id" class="form-label color-label">Couleur</label>
                    <select class="form-control" placeholder="" id="couleur_id" name="couleur_id" value="{{ old('couleur_id') }}">
                        <option value="" selected disabled>---Sélectionnez une Couleur---</option>
                        <!-- Boucle pour chaque couleur -->
                        @foreach($couleurs as $couleur)
                            <option value="{{ $couleur->id }}" {{ $voiture->couleur_id == $couleur->id ? 'selected' : '' }}>{{ $couleur->nom[app()->getLocale()] }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <!-- Ajouter de nouvelles photos -->
        <div class="mb-3">
            <label for="photo" class="form-label color-label">Ajouter de nouvelles photos</label>
            <input type="file" class="form-control" id="photo" name="photo[]" placeholder="" multiple>
        </div>

        <!-- Bouton d'enregistrement -->
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </form>
</div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.">


@endsection