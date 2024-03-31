<?php

namespace App\Http\Controllers;

use App\Services\newsletter;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class NewsletterController extends Controller
{
    public function __invoke(newsletter $newsletter)
    {
        request()->validate([
            'email' => 'required|email',
        ] );
    
        try {
            $newsletter->subscribe(request('email'));
        } catch (\Exception $e) {
            throw ValidationException::withMessages([
                'email' => 'This email could not be added to our newsletter list'
            ]);
        }
        return redirect('/')->with('success','You are now signed in for our newsletter!');
    }
}
