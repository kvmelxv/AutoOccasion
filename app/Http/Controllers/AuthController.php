<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('auth.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:6|max:20'
        ]);

        $credentials = $request->only('email', 'password');

        //validation 
        if (!Auth::validate($credentials)) {
            return redirect(route('login'))
                ->withErrors('Password incorrect')
                ->withInput();
        }

        $user = Auth::getProvider()->retrieveByCredentials($credentials);


        Auth::login($user);
        //return Auth::check();

        $user_email = Auth::user()->email;
        $user_prenom = Auth::user()->prenom;

        //Roles
        Auth::user()->roles()->detach();
        if ($user->role_id === 20) {
            $user->assignRole('Admin');
        } elseif ($user->role_id === 21) {
            $user->assignRole('Employee');
        } elseif ($user->role_id === 22) {
            $user->assignRole('Client');
        }

        //return Auth::check();

        return redirect()->intended(route('home'))->withSuccess('Vous étes connecté avec succes !');

    }

    public function destroy()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
