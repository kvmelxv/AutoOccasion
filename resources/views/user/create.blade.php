@extends('layouts.app')
@section('title', 'Inscription')
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
          <h2 class="text-center mb-4">Inscription</h2>
          <form method="POST">
           @csrf
           <input type="hidden" name="role" value="22">
           <div class="row">
            <div class="col-md-6 mb-3">
              <label for="name" class="form-label">Nom</label>
              <input type="text" name="name" class="form-control" id="name"  placeholder="Entrez votre nom" value="{{ old('name')}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="prenom" class="form-label">Prenom</label>
              <input type="text" name="prenom" class="form-control" id="prenom"  placeholder="" value="{{ old('prenom')}}">
            </div>
            </div>
            <div class="row">
            <div class="col-md-6 mb-3">
              <label for="date_naissance"  class="form-label">Date de naissance</label>
              <input type="date" class="form-control" id="date_naissance" name="date_naissance"  placeholder="" value="{{ old('date_naissance')}}">
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone" class="form-label">Telephone</label>
              <input type="text" class="form-control"  id="phone" name="telephone" placeholder="" value="{{ old('telephone')}}">
            </div>



            <div class="row">
            <div class="col-md-6 mb-3">
              <label for="tel_portable" class="form-label">Telephone Portable</label>
              <input type="text" class="form-control" name="tel_portable" id="tel_portable" placeholder="(123) 456-7890" value="{{ old('tel_portable')}}">
            </div>

            <div class="col-md-6 mb-3">
            <label for="nom_province" class="form-label">Province</label>
            <select class="form-control" placeholder="" id="nom_province" name="province_id" value="{{ old('province_id')}}">
            <option value="" selected disabled>-selectionnez une Province</option>

                @foreach($provinces as $province)
                <option value="{{ $province->id }}" {{ old('province_id') == $province->id ? 'selected' : '' }}>{{$province->nom_province}} </option>
                @endforeach
              </select>            
            </div>

            </div>
           
            <div class="mb-3">
            <label for="num_rue" class="form-label">Adresse</label>
              <input type="text" class="form-control" name="num_rue" id="num_rue"  placeholder="" value="{{ old('num_rue')}}">
            </div>
            </div>

       
            <div class="row">
            <div class="col-md-4 mb-3">
            <label for="nom_ville" class="form-label" >Ville</label>
              <select class="form-control" placeholder="" id="nom_ville" name="ville_id" value="{{ old('ville_id')}}">
              <option value="" selected disabled>selectionnez ville</option>

                @foreach($villes as $ville)
                <option value="{{ $ville->id }}" {{ old('ville_id') == $ville->id ? 'selected' : '' }} >{{$ville->nom_ville}} </option>
                @endforeach
              </select> 

            </div>

            <div class="col-md-4 mb-3">
            <label for="nom_pays" class="form-label">Pays</label>
            <select class="form-control"  placeholder="" name="pays_id" id="nom_pays" value="{{ old('pays_id')}}">
            <option value="" selected disabled>selectionnez un Pays</option>

                @foreach($pays as $pay_s)
                <option value="{{$pay_s->id}}" {{ old('pays_id') == $pay_s->id ? 'selected' : '' }} >{{$pay_s->nom_pays}} </option>
                @endforeach
              </select>            
            </div>

            <div class="col-md-4 mb-3">
            <label for="code_postal" class="form-label">Code Postal</label>
              <input type="text" class="form-control" id="code_postal" name="code_postal" placeholder="P4D 8U7" value="{{ old('code_postal')}}">
            </div>
            </div>

            <div class="mb-3">
            <div class="mb-3">
              <label for="email" class="form-label">Courriel</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Entrez votre Courriel" value="{{ old('email')}}">
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Mot de passe</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="">
            </div>
            <div class="mb-3">
              <label for="password_confirmation" class="form-label">Confirmation de Mot de passe</label>
              <input type="password" class="form-control" placeholder="" name="password_confirmation" id="password_confirmation">
            </div>
            <button type="submit" class="btn btn-primary">S'inscrire</button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.">

  <script>
    $(document).ready(function() {
        $('#phone').inputmask('(999) 999-9999'); 
    });
</script>
  @endsection

