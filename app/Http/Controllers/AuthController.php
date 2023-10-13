<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function login()
    {
        return view('pages.auth.page-login');
    }

    /**
     * Atempt untuk login.
     */
    public function attempt(LoginRequest $request)
    {
        if (Auth::attempt($request->validated())) {
            $request->session()->regenerate();

            // TODO CHECK ROLE
            return redirect()->route('dashboard.user.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }
}
