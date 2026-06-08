<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:8',
        ],[
            'email.required'=> 'An email is required',
            'email.email'=> 'This is not an email format',
            'password.required'=> 'A password is required',
            'password.min'=> 'Password must be longer than 8 characters',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/tasks');
        }

        return back()->withErrors([
            'email' => 'invalid credentials'
        ]);
    }
}
