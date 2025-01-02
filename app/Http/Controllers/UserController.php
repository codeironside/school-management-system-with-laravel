<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //show register/creae form
    public function create(){
        return view('users.register');
    }

    //store new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required','min:3'],
            'email' => ['required','email', Rule::unique('users','email')],
            'password' => 'required|confirmed|min:6'
        ]);

        //hash password usinf bcrypt
        $formFields['password'] = bcrypt($formFields['password']);

        //create users
        $user = User::create($formFields);
        //login
        auth()->login($user);
        return redirect('/')->with('message', 'user created and logged in');

        
    }

    public function Logout(Request $request){
        auth()->logout();


        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }


    publi
}
