<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Tampilkan halaman list pengguna.
     */
    public function halamanUser()
    {
        $users = User::get();

        return view('pages.dashboard.user.halaman-user', [
            'users' => $users,
        ]);
    }

    /**
     * Tampilkan halaman create pengguna.
     */
    public function formTambah()
    {
        $role = DB::table('role')->get()->map(function ($role) {
            return [
                'label' => $role->nama_role,
                'value' => $role->idrole,
            ];
        })->toArray();
        return view('pages.dashboard.user.form-tambah', ['role'=>$role]);
    }

    /**
     * Simpan data pengguna.
     */
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'idrole'=>'required|exists:role,idrole',
            'username'=>'required|string|max:45',
            'password'=>'required|string|max:100'
        ]);

       DB::table('users')->insert([
        'idrole'=> $validated['idrole'],
        'username'=>$validated['username'],
        'password'=>$validated['password']
       ]);


        return redirect()
            ->route('dashboard.user.halamanUser')
            ->with(['message' => 'data pengguna ' . $validated['username']. ' berhasil disimpan']);
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
    public function formEdit(User $user)
    {
        return view('pages.dashboard.user.form-edit', ['user' => $user]);
    }

    /**
     * Edit data pengguna.
     */
    public function edit(UserUpdateRequest $request, User $user)
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
