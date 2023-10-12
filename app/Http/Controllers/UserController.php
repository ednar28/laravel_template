<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Tampilkan halaman list pengguna.
     */
    public function index()
    {
        $users = User::orderBy('name')->paginate();

        return view('pages.dashboard.user.page-user', [
            'users' => $users,
        ]);
    }

    /**
     * Tampilkan halaman create pengguna.
     */
    public function create()
    {
        return view('pages.dashboard.user.page-create');
    }

    /**
     * Simpan data pengguna.
     */
    public function store(UserStoreRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->password = bcrypt($validated['password']);
        $user->save();

        return redirect()
            ->route('dashboard.user.index')
            ->with(['message' => 'data pengguna ' . $user->name . ' berhasil disimpan']);
    }

    /**
     * Lihat detail pengguna.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Tampilkan halaman edit pengguna.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Edit data pengguna.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Hapus data pengguna.
     */
    public function destroy(User $user)
    {
        //
    }
}
