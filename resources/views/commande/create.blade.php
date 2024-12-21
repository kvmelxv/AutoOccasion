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
 
 <!-- Inscription Form section -->
  <section class="register-section py-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <h2 class="text-center mb-4">Adresse éxpedition </h2>
          <form method="POST">
           @csrf
            <div class="mb-3">
              <label for="prix" class="form-label">Total</label>
              <input type="number" name="prix_total" class="form-control" id="prix" step="0.01" readonly  placeholder="" value="{{ $total }}">
            </div>
            <div class="mb-3">
            <label for="num_rue" class="form-label"> <strong>Expedition </strong>- adresse</label>
              <input type="text" class="form-control" name="num_rue" id="num_rue"  placeholder="" value="{{ old('num_rue')}}">
            </div>

            <div class="mb-3">
            <label for="nom_province" class="form-label">Province</label>
            <select class="form-control" placeholder="" id="nom_province" name="province_id" value="{{ old('province_id')}}">
            <option value="" selected disabled>---selectionnez une Province---</option>

                @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{$province->nom_province}} </option>
                @endforeach
              </select>            
            </div>

            <div class="mb-3">
            <label for="nom_ville" class="form-label" >Ville</label>
              <select class="form-control" placeholder="" id="nom_ville" name="ville_id" value="{{ old('ville_id')}}">
              <option value="" selected disabled>---selectionnez une ville---</option>

                @foreach($villes as $ville)
                <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }} >{{$ville->nom_ville}} </option>
                @endforeach
              </select>

            </div>

            <div class="mb-3">
            <label for="nom_pays" class="form-label">Pays</label>
            <select class="form-control"  placeholder="" name="pays_id" id="nom_pays" value="{{ old('pays_id')}}">
            <option value="" selected disabled>---selectionnez un Pays---</option>

                @foreach($pays as $pay_s)
                <option value="{{$pay_s->id}}" {{ old('pays_id') == $pay_s->id ? 'selected' : '' }} >{{$pay_s->nom_pays}} </option>
                @endforeach
              </select>            
            </div>

            <div class="mb-3">
            <label for="code_postal" class="form-label">Code Postal</label>
              <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="P4D 8U7" value="{{ old('code_postal')}}">
            </div>
            <div class="mb-3">
              <label for="date_exp"  class="form-label">Date d'expédition souhaitée</label>
              <input type="date" class="form-control" id="date_exp" name="date"  placeholder="" value="{{ old('date')}}">
            </div>

            <div class="mb-3">
              <label for="type" class="form-label">Type d'expédition</label>
              <select class="form-control"  placeholder="" name="type" id="type" value="{{ 'type'}}">
                <option value="" selected disabled>---selectionnez un type d'expedition---</option>
                <option value="Livraison standard" >Livraison standard</option>
                <option value="Livraison express" >Livraison express</option>
                <option value="Livraison prioritaire" >Livraison prioritaire</option>
                <option value="Ramassage en magasin" >Ramassage en magasin</option>

              </select>            
            </div>

            

    
            <button type="submit" class="btn btn-primary w-100">Suivant</button>
          </form>
        </div>
      </div>
    </div>
  </section>


  @endsection

