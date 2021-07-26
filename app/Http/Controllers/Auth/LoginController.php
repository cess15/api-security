<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function login() {
        return view('auth.login');
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'identification' => ['required','numeric','min:10'],
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'identification' => 'The provided credentials do no match our records'
        ]);
    }

    public function logoutView(Request $request) {

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
