@extends('layouts.app')
@section('title', 'Ajout véhicule')
@section('content')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="custom-width sidebar">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 py-3 scrollable-container">
                <div data-js-container>

                    <!-- Banniere Filter -->
                    <div class="col-md-6 w-100 m-auto banniere mb-5">
                        <img src="https://as2.ftcdn.net/v2/jpg/05/04/75/73/1000_F_504757385_eeccxjaIMkkm67I1gsEELk00bt1qhu9T.jpg" alt="" class="img-banniere">   
                    </div>

 
                    <!-- Heading Filtre -->
                    <div class="d-flex align-items-center justify-content-between mb-3">
                        <h5 class="text-start text-dark">Filtrez Selon Vos Préférences !</h5>
                        <svg width="50px" height="50px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                            <g id="SVGRepo_iconCarrier"> <path d="M22 5.81445V6.50427C22 7.54211 22 8.06103 21.7404 8.49121C21.4808 8.92139 21.0065 9.18837 20.058 9.72234L17.145 11.3622C16.5085 11.7204 16.1903 11.8996 15.9625 12.0974C15.488 12.5093 15.1959 12.9933 15.0636 13.587C15 13.872 15 14.2056 15 14.8727V17.5422C15 19.4517 15 20.4064 14.3321 20.8242C13.6641 21.242 12.7248 20.8748 10.8462 20.1404C9.95128 19.7905 9.50385 19.6156 9.25192 19.2611C9 18.9065 9 18.4518 9 17.5422L9 14.8727C9 14.2056 9 13.872 8.93644 13.587C8.80408 12.9933 8.51199 12.5093 8.03751 12.0974C7.80967 11.8996 7.49146 11.7204 6.85504 11.3622L3.94202 9.72234C2.99347 9.18837 2.5192 8.92139 2.2596 8.49121C2 8.06103 2 7.54211 2 6.50427V5.81445" stroke="#c92a2a" stroke-width="1.5"/> <path opacity="0.5" d="M22 5.81466C22 4.48782 22 3.8244 21.5607 3.4122C21.1213 3 20.4142 3 19 3H5C3.58579 3 2.87868 3 2.43934 3.4122C2 3.8244 2 4.48782 2 5.81466" stroke="#c92a2a" stroke-width="1.5"/> </g>
                        </svg>
                    </div>

                    <!-- Formulaire Filtre -->
                    <form class="ferme" data-js-filtre-index>
                        @csrf
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" name="marque_id" id="selectMarque" data-js-marques>
                                <option value="">Marque</option>
                                @foreach($marques as $marque)
                                    <option value="{{ $marque->id }}" {{ old('marque') == $marque->id ? 'selected' : '' }}>{{$marque->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectModele" name="modele_id" data-js-modeles></select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <input type="number" name="annee" class="form-control" id="inputAnnee" placeholder="Entrez une année">
                        </div>
                    
            
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectPrix" name="prix">
                                <option value="">Prix</option>
                                <option value="0-5000">$0 - $5000</option>
                                <option value="5000-10000">$5000 - $10,000</option>
                                <option value="10000-20000">$10,000 - $20,000</option>
                                <option value="20000-30000">$20,000 - $30,000</option>
                                <option value="30000-50000">$30,000 - $50,000</option>
                                <option value="50000-1000000">$50,000 et plus</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectKilometrage" name="kilometrage">
                                <option value="">Kilométrage</option>
                                <option value="0-20000">0 - 20000 km</option>
                                <option value="20000-50000">20000 - 50000 km</option>
                                <option value="50000-100000">50000 - 100000 km</option>
                                <option value="100000-10000000">100000 km et plus</option>
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectTransmission" name="transmission_id">
                                <option value="">Transmission</option>
                                @foreach($transmissions as $transmission)
                                    <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{$transmission->nom[app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectMotopropulseur" name="motopropulseur_id">
                                <option value="">Motopropulseur</option>
                                @foreach($motopropulseurs as $motopropulseur)
                                    <option value="{{ $motopropulseur->id }}" {{ old('motopropulseur_id') == $motopropulseur->id ? 'selected' : '' }}>{{$motopropulseur->nom[app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectCarburant" name="carburant_id">
                                <option value="">Carburant</option>
                                @foreach($carburants as $carburant)
                                    <option value="{{$carburant->id}}" {{ old('carburant_id') == $carburant->id ? 'selected' : '' }}>{{$carburant->nom[app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12 mb-4">
                            <select class="form-control p-2" id="selectCouleur" name="couleur_id">
                                <option value="">Couleur</option>
                                @foreach($couleurs as $couleur)
                                    <option value="{{$couleur->id}}" {{ old('couleur_id') == $couleur->id ? 'selected' : '' }}>{{$couleur->nom[app()->getLocale()]}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="row">
                            <div class="col">
                                <button type="submit" class="btn btn-primary form-control" data-js-btn-filtre>Soumettre le filtre</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="col py-3 scrollable-container">

            <div class="col-12 col-md-6 col-lg-4 w-100 m-auto banniere px-5">
                <div class="w-100 h-100">
                    <img src="https://as2.ftcdn.net/v2/jpg/05/04/75/73/1000_F_504757385_eeccxjaIMkkm67I1gsEELk00bt1qhu9T.jpg" class="img-banniere" alt="">
                </div>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-4 p-5">
            @foreach ($voitures as $voiture)
                @if(!$voiture->commande_id)
                    <div class="col">
                        <a class="card-car" href="{{ route('show.voiture', $voiture->id) }}">
                            <div class="card-full">
                                <img src="{{ asset('storage/' . $voiture->photos->first()->path) }}" alt="Première photo de la voiture" class="card-img"/>
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="card-title">{{ $voiture->annee }} {{ $voiture->modele->marque->nom }} {{ $voiture->modele->nom }}</h5>
                                        <h5 class="card-title color-price">{{ $voiture->prixDeVente() }} $</h5>
                                    </div>
                                    <div class="d-flex gap-4">
                                        <div class="d-flex gap-1 align-items-center">
                                            <svg fill="#c01c28" width="23px" height="23px" viewBox="0 0 512 512" data-name="Layer 1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" stroke="#c01c28">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                <g id="SVGRepo_iconCarrier">
                                                <title/>
                                                <path d="M256,62.24c-106.82,0-193.72,86.56-193.72,192.94s86.9,193,193.72,193,193.72-86.56,193.72-192.95S362.82,62.24,256,62.24Zm0,369.89c-98,0-177.72-79.38-177.72-176.95S158,78.24,256,78.24s177.72,79.38,177.72,176.94S354,432.13,256,432.13Zm127.58-103.6h0v0h0a8,8,0,0,1-10.9,2.91l-20-11.51a8,8,0,0,1,8-13.87l12.91,7.41A130.31,130.31,0,0,0,387,263.19H372.18a8,8,0,0,1,0-16H387a129.36,129.36,0,0,0-13.56-50.32l-12.87,7.4a7.91,7.91,0,0,1-4,1.07,8,8,0,0,1-4-14.94l12.8-7.35a131.91,131.91,0,0,0-37-36.83L321,159a8,8,0,0,1-13.84-8l7.39-12.75A130.71,130.71,0,0,0,264,124.73v14.76a8,8,0,0,1-16,0V124.73a130.71,130.71,0,0,0-50.56,13.5L204.83,151A8,8,0,1,1,191,159l-7.41-12.78a132,132,0,0,0-37,36.82l12.8,7.36a8,8,0,1,1-8,13.87l-12.88-7.4A129.36,129.36,0,0,0,125,247.18h14.86a8,8,0,0,1,0,16H125a130.31,130.31,0,0,0,13.53,50.33l12.9-7.41a8,8,0,1,1,8,13.87l-20,11.51a8,8,0,0,1-10.89-2.91h0l0,0h0a146.26,146.26,0,0,1-19.71-72.94c0-.14,0-.27,0-.41s0-.24,0-.36A145.42,145.42,0,0,1,128,182.59a7.54,7.54,0,0,1,.38-.75,7.25,7.25,0,0,1,.53-.79,148.09,148.09,0,0,1,52.63-52.42,7.52,7.52,0,0,1,.75-.5,8.52,8.52,0,0,1,.8-.4,146.86,146.86,0,0,1,72.51-19.25h.72a146.86,146.86,0,0,1,72.51,19.25,8.52,8.52,0,0,1,.8.4,7.52,7.52,0,0,1,.75.5,148,148,0,0,1,52.63,52.42,7.25,7.25,0,0,1,.53.79c.14.25.27.5.38.75a145.42,145.42,0,0,1,19.33,72.23c0,.12,0,.24,0,.37s0,.26,0,.4a146.26,146.26,0,0,1-19.7,72.92Zm-96.33-73.37a31.24,31.24,0,0,0-39.42-30l-27.56-47.54a8,8,0,1,0-13.84,8L234,233.15a31.09,31.09,0,0,0,22,53.14,31.5,31.5,0,0,0,8.15-1.08l5.28,9.12a8,8,0,0,0,13.84-8L278,277.22A31.13,31.13,0,0,0,287.25,255.16Zm-46.43,0a15.16,15.16,0,0,1,7.59-13.08h0a15.1,15.1,0,1,1-7.6,13.08Zm61.61,84.5H209.57a8,8,0,0,0-8,8v46.23a8,8,0,0,0,8,8h92.86a8,8,0,0,0,8-8V347.66A8,8,0,0,0,302.43,339.66Zm-8,46.23H217.57V355.66h76.86Z"/></g>
                                            </svg> 
                                            <p class="card-attribute">{{ $voiture->kilometrage }} km</p>
                                        </div>
                                        <div class="d-flex gap-1 align-items-center">
                                            <svg width="23px" height="23px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0"/>
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/>
                                                <g id="SVGRepo_iconCarrier"> <path d="M8 9V15" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> 
                                                <path d="M12 9V15" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> <path d="M8 12H13C13.9319 12 14.3978 12 14.7654 11.8478C15.2554 11.6448 15.6448 11.2554 15.8478 10.7654C16 10.3978 16 9.93188 16 9" stroke="#e01b24" stroke-width="1.5" stroke-linecap="round"/> <path d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" stroke="#e01b24" stroke-width="1.5"/> </g>
                                            </svg>
                                            <p class="card-attribute">Automatique</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endif
            @endforeach
            <div class="d-flex justify-content-center paginate">
                {{ $voitures }}
            </div>
            </div>
        </div>
    </div>
</div>


<!-- <div class="border border-dark">
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-xl-5 p-5">
    @foreach ($voitures as $voiture)
        @if(!$voiture->commande_id)
            <div class="col">
                <div class="card mb-5">
                    <img src="{{ asset('storage/' . $voiture->photos->first()->path) }}" alt="Première photo de la voiture" class="card-img-top"/>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">
                        This is a longer card with supporting text below as a natural lead-in to
                        additional content. This content is a little bit longer.
                        </p>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div> -->

  <!-- 
  <section class="galerie" id="galerie">

<div class="heading mt-4 p-2">
  <h1><span>Explorez Nos Top Offres</span></h1>
  <h3>Des véhicules de luxe à des prix compétitifs.</h3>
</div>

<div class="container p-4 mt-5 shadow-lg bordure" data-js-container>
<div class="d-flex align-items-center justify-content-between mb-3">
    <h3 class="text-center">Filtrez Votre Recherche Selon Vos Critères !</h3>
    <svg xmlns="http://www.w3.org/2000/svg" class="cursor" height="45" width="45" fill="#c92a2a" viewBox="0 -960 960 960"><path d="M480-345 240-585l56-56 184 184 184-184 56 56-240 240Z"/></svg>
</div>
<form class="ferme" data-js-filtre-index>
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-control" name="marque_id" id="selectMarque" data-js-marques>
                <option value="">Selectionnez une marque</option>
                @foreach($marques as $marque)
                    <option value="{{ $marque->id }}" {{ old('marque') == $marque->id ? 'selected' : '' }}>{{$marque->nom}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="selectModele" name="modele_id" data-js-modeles></select>
        </div>
        <div class="col-md-4">
            <input type="number" name="annee" class="form-control" id="inputAnnee" placeholder="Entrez une année">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-control" id="selectPrix" name="prix">
                <option value="">Sélectionnez une marge de prix</option>
                <option value="0-5000">$0 - $5000</option>
                <option value="5000-10000">$5000 - $10,000</option>
                <option value="10000-20000">$10,000 - $20,000</option>
                <option value="20000-30000">$20,000 - $30,000</option>
                <option value="30000-50000">$30,000 - $50,000</option>
                <option value="50000-1000000">$50,000 et plus</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="selectKilometrage" name="kilometrage">
                <option value="">Sélectionnez une marge de kilométrage</option>
                <option value="0-20000">0 - 20000 km</option>
                <option value="20000-50000">20000 - 50000 km</option>
                <option value="50000-100000">50000 - 100000 km</option>
                <option value="100000-10000000">100000 km et plus</option>
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="selectTransmission" name="transmission_id">
                <option value="">Selectionnez un type de Transmission</option>
                @foreach($transmissions as $transmission)
                    <option value="{{$transmission->id}}" {{ old('transmission_id') == $transmission->id ? 'selected' : '' }}>{{$transmission->nom[app()->getLocale()]}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4">
            <select class="form-control" id="selectMotopropulseur" name="motopropulseur_id">
                <option value="">Selectionnez un type de Motopropulseur</option>
                @foreach($motopropulseurs as $motopropulseur)
                    <option value="{{ $motopropulseur->id }}" {{ old('motopropulseur_id') == $motopropulseur->id ? 'selected' : '' }}>{{$motopropulseur->nom[app()->getLocale()]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="selectCarburant" name="carburant_id">
                <option value="">Selectionnez un type de Carburant</option>
                @foreach($carburants as $carburant)
                    <option value="{{$carburant->id}}" {{ old('carburant_id') == $carburant->id ? 'selected' : '' }}>{{$carburant->nom[app()->getLocale()]}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <select class="form-control" id="selectCouleur" name="couleur_id">
                <option value="">Selectionnez une couleur</option>
                @foreach($couleurs as $couleur)
                    <option value="{{$couleur->id}}" {{ old('couleur_id') == $couleur->id ? 'selected' : '' }}>{{$couleur->nom[app()->getLocale()]}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <button type="submit" class="btn btn-primary form-control" data-js-btn-filtre>Soumettre le filtre</button>
        </div>
    </div>
</form>
</div>


<div class="galerie-container">
  <div class="row" data-js-container-voitures>
  @foreach ($voitures as $voiture)
  @if(!$voiture->commande_id)
    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
      <div class="box shadow">
        <a class="box-img" href="{{ route('show.voiture', $voiture->id) }}">
          @if ($voiture->photos->isNotEmpty())
            <img src="{{ asset('storage/' . $voiture->photos->first()->path) }}" alt="Première photo de la voiture">
          @endif
          <p>{{ $voiture->annee }}</p>
          <h3>{{ $voiture->modele->marque->nom }} {{ $voiture->modele->nom }}</h3>
          <h2><span>{{ $voiture->prixDeVente() }} $</span></h2>
        </a>
        <div class="btn btn-lg btn-primary d-flex justify-content-center btn-no-radius" role="button">
          <a href="{{ route('ajout.panier', $voiture->id) }}" class="align-self-center"><i class="fa-solid fa-cart-shopping fa-lg"></i></a>
        </div>
      </div>
    </div>
    @endif
  @endforeach

  
  <div class="d-flex justify-content-center paginate">
    {{ $voitures }}
  </div>

</div>
</div>
</section> -->
@endsection

