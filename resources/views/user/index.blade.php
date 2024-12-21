@extends('layouts.app')
@section('title', 'Liste Utilisateurs')
@section('content')


<div class="container p-5">
    <form action="{{ route('user.filtre') }}" class="m-4">
        <h4 class="mb-4">Filtre Des Utilisateurs</h4>
        @csrf
        <div class="row">
            <div class="col-md-4 mb-2">
                <input type="text" class="form-control" name="name" placeholder="Nom" value="{{ request('name') }}">
            </div>
            <div class="col-md-4 mb-2">
                <input type="text" class="form-control" name="email" placeholder="Courriel" value="{{ request('email') }}">
            </div>
            <div class="col-md-4 mb-2">
                <input type="text" class="form-control" name="telephone" placeholder="Telephone" value="{{ request('telephone') }}">
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12 mb-2">
                <button type="submit" class="btn btn-primary btn-block w-100">Filtrer</button>
            </div>
        </div>
    </form>

    <h3 class="mt-5 mb-4">Liste Des Utilisateurs</h3>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Courriel</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td class="align-middle">{{ $user->name }}</td>
                    <td class="align-middle">{{ $user->prenom }}</td>
                    <td class="align-middle">{{ $user->email }}</td>
                    <td class="align-middle">{{ $user->telephone }}</td>
                    <td class="align-middle">
                        @foreach($roles as $role)
                        @if($role->id == $user->role_id)
                        {{ $role->name }}
                        @endif
                        @endforeach
                    </td>
                    <td>
                    <form action="{{ route('user.editRole', $user->id) }}" method="POST" class="row">
                    @csrf
                    @method('PUT')
                        <div class="col-md-6 mb-2">
                            <select name="role_id" class="form-control form-control-sm mb-2">
                            @foreach($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-sm btn-outline-primary btn-block">Attribuer le rôle</button>
                        </div>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection