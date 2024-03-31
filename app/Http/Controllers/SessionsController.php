<?php

namespace App\Http\Controllers;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view("sessions.create");
    }
    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|exists:users,email',
            'password'=> 'required|min:8',
            ]);
        
        if (auth()->attempt($attributes)) {
            session()->regenerate();

            return redirect('/')->with('success','welcome back!');
        }

        throw ValidationException::withMessages(['email' => 'your credentials did not match']);
    }
    public function destroy()
    {
        auth()->logout();

        return redirect("/")->with("success","Goodbye!");
    }
}
