<?php

namespace App\Http\Controllers;

use App\Models\Statut;
use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Http\Request;
use App\Models\Ville;
use App\Models\Province;
use App\Models\Pays;
use App\Models\Adresse;
use App\Models\User;

use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $this->authorize('edit-role');

        $users = User::all();
        $roles = Role::all();
        return view('user.index', ['users' => $users, 'roles' => $roles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $villes = Ville::all();
        $provinces = Province::all();
        $pays = Pays::all();


        return view('user.create', ['villes' => $villes, 'provinces' => $provinces, 'pays' => $pays]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'date_naissance' => 'required|date|date_format:Y-m-d',
                'telephone' => 'required',
                'tel_portable' => '',
                'num_rue' => 'required|max:150',
                'province_id' => 'required|exists:provinces,id',
                'ville_id' => 'required|exists:villes,id',
                'pays_id' => 'required|exists:pays,id',
                'code_postal' => 'required|regex:/^[A-Za-z]\d[A-Za-z][- ]?\d[A-Za-z]\d$/',
                'email' => 'required|email|max:150|unique:users,email',
                'password' => [
                    'required',
                    'string',
                    Password::min(6)->max(20)->mixedCase()->letters()->numbers()->symbols()
                ],
                'password_confirmation' => 'required|same:password'
            ],
            [
                'name.required' => 'Please enter your name.',
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already taken.',

                'tel_portable' => 'Invalid phone number',
                'telephone' => 'Invalid phone number',
                'province_id.required' => 'Please select a provence.',
                'ville_id.required' => 'Please select a City.',
                'pays_id.required' => 'Please select a Country.',
                'code_postal.required' => 'Please enter a valid postal code.',
                'code_postal.regex' => 'Please enter a valid postal code.',

            ]
        );

        $adresse = new Adresse;
        $adresse->num_rue = $request->num_rue;
        $adresse->code_postal = $request->code_postal;
        $adresse->ville_id = $request->ville_id;

        $adresse->save();
        $adresseID = $adresse->id;

        $user = User::create([

            'name' => $request->name,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'tel_portable' => $request->tel_portable,
            'adresse_id' => $adresse->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role

        ]);

        return redirect()->route('home')->with('success', 'Inscris successfully'); // not view('..')



    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //$villeController = app(VilleController::class);

        //return $user;
        $adresses = Adresse::all();

        return view('user.show', ["user" => $user, "adresses" => $adresses]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $villes = Ville::all();
        $provinces = Province::all();
        $pays = Pays::all();


        return view('user.edit', ['villes' => $villes, 'provinces' => $provinces, 'pays' => $pays, 'user' => $user]);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        //return $request;
        //return auth()->user()->email;
        $request->validate(
            [
                'name' => 'required|string|max:50',
                'prenom' => 'required|string|max:50',
                'date_naissance' => 'required|date|date_format:Y-m-d',
                'telephone' => 'required',
                'tel_portable' => '',
                'num_rue' => 'required|max:150',
                'province_id' => 'required|exists:provinces,id',
                'ville_id' => 'required|exists:villes,id',
                'pays_id' => 'required|exists:pays,id',
                'code_postal' => 'required|regex:/^[A-Za-z]\d[A-Za-z][- ]?\d[A-Za-z]\d$/',
                'email' => [
                    'required',
                    'email',
                    'max:150',
                    Rule::unique('users', 'email')->ignore(auth()->user()->id),
                ],
                'password' => [
                    'required',
                    'string',
                    Password::min(6)->max(20)->mixedCase()->letters()->numbers()->symbols()
                ],
                'password_confirmation' => 'required|same:password'
            ],
            [
                'name.required' => 'Please enter your name.',
                'email.required' => 'Please enter your email address.',
                'email.email' => 'Please enter a valid email address.',
                'email.unique' => 'This email address is already taken.',

                'tel_portable' => 'Invalid phone number',
                'telephone' => 'Invalid phone number',
                'province_id.required' => 'Please select a provence.',
                'ville_id.required' => 'Please select a City.',
                'pays_id.required' => 'Please select a Country.',
                'code_postal.required' => 'Please enter a valid postal code.',
                'code_postal.regex' => 'Please enter a valid postal code.',

            ]
        );

        $adresse = Adresse::find($user->adresse_id);


        $adresse->num_rue = $request->num_rue;
        $adresse->code_postal = $request->code_postal;
        $adresse->ville_id = $request->ville_id;

        $adresse->save();
        //$adresseID = $adresse->id;

        $user->update([

            'name' => $request->name,
            'prenom' => $request->prenom,
            'date_naissance' => $request->date_naissance,
            'telephone' => $request->telephone,
            'tel_portable' => $request->tel_portable,
            'adresse_id' => $adresse->id,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);


        return redirect()->route('home')->with('success', 'Informations Modifiées avec succès !'); // not view('..')
    }

    public function updateRole(Request $request, User $user)
    {
        //
        $this->authorize('edit-role');

        $request->validate(
            [
                'role_id' => 'required|exists:roles,id'
            ],
            [
                'role_id.required' => 'Veuillez Selectionner un role !',
            ]
        );


        $userM = User::find($user->id);

        $userM->update(['role_id' => $request->role_id]);

        return redirect()->route('users')->with('success', 'Role attribué avec succès .');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();

        return redirect()->route('home')->with('success', 'Compte Supprimee avec succes !');

    }

    public function filtre(Request $request)
    {
        $query = User::query();

        if ($request->has('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->has('email')) {
            $query->where('email', 'like', '%' . $request->email . '%');
        }


        if ($request->has('telephone')) {
            $query->where('telephone', 'like', '%' . $request->telephone . '%');
        }

        $users = $query->get();
        $roles = Role::all();
        return view('user.index', compact('users', 'roles'));
    }
}
