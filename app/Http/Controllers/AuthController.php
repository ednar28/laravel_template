<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        $validated = $request->validated();

        $user = User::where('username', $validated['username'])->first();

        if (is_null($user) || !Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');    
        }

        auth()->user($user->iduser);

        return redirect()->route('dashboard.beranda');
    }
}
