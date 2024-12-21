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
                <h3 class="p-4">Modification D'un Motopropulseur</h3>
                <form method="post" action="{{ route('motopropulseur.update', $motopropulseur->id) }}" class="p-4">
                @csrf
                @method('PUT')
                    <div class="mb-4">
                      <label for="motopropulseur_fr" class="form-label mb-4">Motopropulseur en Francais</label>
                      <input type="text" name="motopropulseur_fr" class="form-control" id="motopropulseur_fr"  placeholder="Entrez le nom du motopropulseur en francais" value="{{ old('motopropulseur_fr', $motopropulseur->nom['fr']) }}">
                    </div>
                    <div class="mb-4">
                      <label for="motopropulseur_en" class="form-label mb-4">Motopropulseur en Anglais</label>
                      <input type="text" name="motopropulseur_en" class="form-control" id="motopropulseur_en"  placeholder="Entrez le nom du motopropulseur en anglais" value="{{ old('motopropulseur_en', $motopropulseur->nom['en']) }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection