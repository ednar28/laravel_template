<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SatuanController extends Controller
{
    public function halamanSatuan() {
        // select * from `satuan`s
        $satuan = DB::table('satuan')->get();


        return view('pages.dashboard.satuan.halaman-satuan', [
            'satuan' => $satuan,
        ]);
    }

    /**
     * Tampilkan halaman create pengguna.
     */
    public function formTambah()
    {
        return view('pages.dashboard.satuan.form-tambah');
    }

    /**
     * Buat data satuan.
     */
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'nama_satuan' => 'required|string|max:45',
        ]);

        DB::table('satuan')->insert([
            'nama_satuan' => $validated['nama_satuan'],
        ]);

        return redirect()
            ->route('dashboard.satuan.halamanSatuan')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama_satuan']]);
    }

    /**
     * Tampilkan halaman create pengguna.
     */
    public function formEdit(int $id)
    {
        $satuan = DB::table('satuan')->where('idsatuan', $id)->first();
        return view('pages.dashboard.satuan.form-edit', ['satuan' => $satuan]);
    }

    /**
     * Buat data satuan.
     */
    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama_satuan' => 'required|string|max:45',
        ]);


        DB::table('satuan')
        ->where('idsatuan', $id)
        ->update([
            'nama_satuan' => $validated['nama_satuan'],
        ]);

        return redirect()
            ->route('dashboard.satuan.halamanSatuan')
            ->with(['message' => ' Edit ' . $validated['nama_satuan']]);
    }

    public function memulihkan (int $id)
    {
        DB::table('satuan')
            ->where('idsatuan', $id)
            ->update(['deleted_at' => null]);

        return redirect()->route('dashboard.satuan.halamanSatuan');
    }

    public function hapus (int $id)
    {
        DB::table('satuan')
            ->where('idsatuan', $id)
            ->update(['deleted_at'=> now()]);

        return redirect()->route('dashboard.satuan.halamanSatuan');
    }
}