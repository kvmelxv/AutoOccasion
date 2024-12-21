@extends('layouts.app')
@section('title', 'User')
@section('content')

<section>
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="/assets/img/profil.webp" alt="avatar"
              class="rounded-circle img-fluid m-auto" style="width: 150px; height: 150px; object-fit: cover;">
            <h5 class="my-3">{{$user->name}} {{$user->prenom}}</h5>
            <p class="text-muted mb-1">{{$user->role->name}}</p>
            <p class="text-muted mb-4">{{$user->adresses->villes->nom_ville}}, {{$user->adresses->villes->provinces->nom_province}}, {{$user->adresses->villes->provinces->pays->nom_pays}}</p>
            <div class="d-flex justify-content-center mb-2">
              <a href="{{ route('user.edit', $user->id)}}" class="btn btn-outline-warning ms-1">Modifier</a>
              <button type="button" data-mdb-button-init data-mdb-ripple-init class="btn btn-outline-danger ms-1" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">Supprimer</button>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3 d-flex align-items-center gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" fill="#c92a2a" height="20" viewBox="0 -960 960 960" width="20"><path d="M160-80q-33 0-56.5-23.5T80-160v-440q0-33 23.5-56.5T160-680h200v-120q0-33 23.5-56.5T440-880h80q33 0 56.5 23.5T600-800v120h200q33 0 56.5 23.5T880-600v440q0 33-23.5 56.5T800-80H160Zm0-80h640v-440H600q0 33-23.5 56.5T520-520h-80q-33 0-56.5-23.5T360-600H160v440Zm80-80h240v-18q0-17-9.5-31.5T444-312q-20-9-40.5-13.5T360-330q-23 0-43.5 4.5T276-312q-17 8-26.5 22.5T240-258v18Zm320-60h160v-60H560v60Zm-200-60q25 0 42.5-17.5T420-420q0-25-17.5-42.5T360-480q-25 0-42.5 17.5T300-420q0 25 17.5 42.5T360-360Zm200-60h160v-60H560v60ZM440-600h80v-200h-80v200Zm40 220Z"/></svg>
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->name}} {{$user->prenom}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#c92a2a" height="20" viewBox="0 -960 960 960" width="20"><path d="M160-160q-33 0-56.5-23.5T80-240v-480q0-33 23.5-56.5T160-800h640q33 0 56.5 23.5T880-720v480q0 33-23.5 56.5T800-160H160Zm320-280L160-640v400h640v-400L480-440Zm0-80 320-200H160l320 200ZM160-640v-80 480-400Z"/></svg>
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->email}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#c92a2a" height="20" viewBox="0 -960 960 960" width="20"><path d="M798-120q-125 0-247-54.5T329-329Q229-429 174.5-551T120-798q0-18 12-30t30-12h162q14 0 25 9.5t13 22.5l26 140q2 16-1 27t-11 19l-97 98q20 37 47.5 71.5T387-386q31 31 65 57.5t72 48.5l94-94q9-9 23.5-13.5T670-390l138 28q14 4 23 14.5t9 23.5v162q0 18-12 30t-30 12ZM241-600l66-66-17-94h-89q5 41 14 81t26 79Zm358 358q39 17 79.5 27t81.5 13v-88l-94-19-67 67ZM241-600Zm358 358Z"/></svg>
                <p class="mb-0">Phone</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->telephone}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#c92a2a" height="20" viewBox="0 -960 960 960" width="20"><path d="M280-40q-33 0-56.5-23.5T200-120v-720q0-33 23.5-56.5T280-920h400q33 0 56.5 23.5T760-840v720q0 33-23.5 56.5T680-40H280Zm0-200v120h400v-120H280Zm200 100q17 0 28.5-11.5T520-180q0-17-11.5-28.5T480-220q-17 0-28.5 11.5T440-180q0 17 11.5 28.5T480-140ZM280-320h400v-400H280v400Zm0-480h400v-40H280v40Zm0 560v120-120Zm0-560v-40 40Z"/></svg>
                <p class="mb-0">Mobile</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->tel_portable}}</p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3 d-flex align-items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="#c92a2a" height="20" viewBox="0 -960 960 960" width="20"><path d="M480-480q33 0 56.5-23.5T560-560q0-33-23.5-56.5T480-640q-33 0-56.5 23.5T400-560q0 33 23.5 56.5T480-480Zm0 294q122-112 181-203.5T720-552q0-109-69.5-178.5T480-800q-101 0-170.5 69.5T240-552q0 71 59 162.5T480-186Zm0 106Q319-217 239.5-334.5T160-552q0-150 96.5-239T480-880q127 0 223.5 89T800-552q0 100-79.5 217.5T480-80Zm0-480Z"/></svg>
                <p class="mb-0">Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0">{{$user->adresses->num_rue}}, {{$user->adresses->code_postal}} {{$user->adresses->villes->nom_ville}}, 
                        {{$user->adresses->villes->provinces->nom_province}}, {{$user->adresses->villes->provinces->pays->nom_pays}}</p>
              </div>
            </div>
          </div>
        </div>
       </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-danger " id="deleteModalLabel">Confirmation de Suppréssion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Etes-vous sur de vouloir suppriemr votre compte  ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-dismiss="modal">annuler</button>
        <form action="{{ route('user.delete', $user->id) }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-sm btn-danger">Supprimer</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection