<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|min:5|max:200|unique:users,username',
            'email'=> 'required|email|max:255|unique:users,email',
            'password'=> 'required|max:255|min:8',
            ]);
        
        // dd($attributes['password']);
        
        $user = User::create($attributes);

        auth()->login($user);

        return redirect('/')->with('success','your account has been created.');
    }
    
}
