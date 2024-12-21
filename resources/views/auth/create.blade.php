@extends('layouts.app')
@section('title', 'Se connecter')
@section('content')

<!--  errors show-->
@if(!$errors->isEmpty())
<div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>

@endif
  <section class="user-form-section py-5 bg-light">
    <div class="container col-xl-12 col-xxl-10 px-2">
      <div class="row align-items-center g-lg-5 py-3">
      <div class="col-lg-7 text-center text-lg-start">
        <h1 class="display-4 fw-bold lh-1 text-body-emphasis mb-3">Connectez-vous pour découvrir nos voitures d'occasion</h1>
        <p class="col-lg-10 fs-4 fw-light"> Rejoignez-nous pour explorer notre sélection de voitures d'occasion de qualité.</p>
      </div>
      <div class="col-md-10 mx-auto col-lg-5">
        <form class="p-4 p-md-5 border rounded-3 bg-light bg-gradient" method="POST">
          @csrf
          <div class="form-floating mb-3">
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            <label for="email" class="form-label">Email</label>
          </div>
          <div class="form-floating mb-3">
            <input type="password" class="form-control" id="password" name="password">
            <label for="password" class="form-label">Password</label>
          </div>
          <div class="checkbox mb-3">
            <label class="fw-light">
              <input type="checkbox" value="remember-me"> Remember me
            </label>
          </div>
          <button class="w-100 btn btn-lg btn-primary" type="submit">Login</button>
          <hr class="my-2">
          <a class="fw-light" href="">Forgot password ?</a>
          <hr class="my-2">
          <small class="text-body-secondary fw-light">By clicking Sign up, you agree to the terms of use.</small>
        </form>
      </div>
      </div>
    </div>
  </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>
      
@endsection