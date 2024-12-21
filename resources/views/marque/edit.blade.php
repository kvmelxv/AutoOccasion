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
            <div class="add-brand shadow rounded">
                <h3 class="p-4">Modification D'une Marque</h3>
                <form method="post" Action="{{ route('marque.update', $marque->id) }}" class="p-4">
                @csrf
                @method('PUT')
                    <div class="mb-4">
                      <label for="name" class="form-label mb-4">Marque</label>
                      <input type="text" name="nom" class="form-control" id="name"  placeholder="Entrez le nom de la marque"  value="{{ old('nom', $marque->nom) }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection