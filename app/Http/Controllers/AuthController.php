<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
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
                'username' => 'The provided credentials do not match our records.',
            ])->onlyInput('username');
        }

        auth()->login($user);

        return redirect()->route('dashboard.beranda');
    }
}
