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
                <h3 class="p-4">Modification D'une Transmission</h3>
                <form method="post" action="{{ route('transmission.update', $transmission->id) }}" class="p-4">
                @csrf
                @method('PUT')
                    <div class="mb-4">
                      <label for="transmission_fr" class="form-label mb-4">Transmission en Francais</label>
                      <input type="text" name="transmission_fr" class="form-control" id="transmission_fr"  placeholder="Entrez le nom de la transmission en francais" value="{{ old('transmission_fr', $transmission->nom['fr']) }}">
                    </div>
                    <div class="mb-4">
                      <label for="transmission_en" class="form-label mb-4">Transmission en Anglais</label>
                      <input type="text" name="transmission_en" class="form-control" id="transmission_en"  placeholder="Entrez le nom de la transmission en anglais" value="{{ old('transmission_en', $transmission->nom['en']) }}">
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection