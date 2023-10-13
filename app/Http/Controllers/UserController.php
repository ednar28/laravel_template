<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;

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
        return view('pages.dashboard.user.page-update', ['user' => $user]);
    }

    /**
     * Edit data pengguna.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $validated = $request->validated();

        $user->name = $validated['name'];
        $user->email = $validated['email'];
        $user->save();

        return redirect()
            ->route('dashboard.user.index')
            ->with(['message' => 'data pengguna ' . $user->name . ' berhasil diubah']);
    }

    /**
     * Hapus data pengguna.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()
            ->route('dashboard.user.index')
            ->with(['message' => 'data pengguna ' . $user->name . ' berhasil dihapus']);
    }
}
