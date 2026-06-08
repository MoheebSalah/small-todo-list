<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ],[
            'name.required'=> 'A name is required',
            'email.required'=> 'An email is required',
            'email.email'=> 'This is not an email format',
            'email.unique'=> 'This email already has an account',
            'password.required'=> 'A password is required',
            'password.confirmed'=> 'Confirm the password',
            'password.min'=> 'Password must be longer than 8 characters',
        ]);

        $user = \App\Models\User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make( $validated['password']),
        ]);

        Auth::login($user);

        return(redirect('/tasks'));

    }
}
