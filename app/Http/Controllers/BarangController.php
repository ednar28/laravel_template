<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function halamanBarang()
    {
        $barang = DB::select('CALL tampilkan_barang()');

        return view('pages.dashboard.barang.halaman-barang', [
            'barang' => $barang,
        ]);
    }
    /**
     * Tampilkan halaman create barang.
     */
    public function formTambah()
    {
        $satuan = DB::table('satuan')->get()->map(function ($satuan) {
            return [
                'label' => $satuan->nama_satuan,
                'value' => $satuan->idsatuan,
            ];
        })->toArray();

        return view('pages.dashboard.barang.form-tambah', ['satuan' => $satuan]);
    }

    /**
     * Buat data barang.
     */
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'idsatuan' => 'required|exists:satuan,idsatuan',
            'jenis' => 'required|string|max:1',
            'nama' => 'required|string|max:45',
            'harga' => 'required|integer|max:1000000',

        ]);

        DB::table('barang')->insert([
            'idsatuan' => $validated['idsatuan'],
            'nama' => $validated['nama'],
            'jenis' => $validated['jenis'],
            'harga' => $validated['harga'],
        ]);

        return redirect()
            ->route('dashboard.barang.halamanBarang')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama']]);
    }


    public function formEdit(int $id)
    {
        $barang = DB::table('barang')->where('idbarang', $id)->first();
        $satuan = DB::table('satuan')->get()->map(function ($satuan) {
            return [
                'label' => $satuan->nama_satuan,
                'value' => $satuan->idsatuan,
            ];
        })->toArray();
        return view('pages.dashboard.barang.form-edit', [
            'barang' => $barang,
            'satuan' => $satuan,
        ]);
    }


    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:45',
        ]);

        DB::table('barang')
            ->where('idbarang', $id)
            ->update([
                'nama' => $validated['nama'],
            ]);

        return redirect()
            ->route('dashboard.barang.halamanBarang')
            ->with(['message' => ' Edit ' . $validated['nama']]);
    }


    public function memulihkan(int $id)
    {
        DB::table('barang')
            ->where('idbarang', $id)
            ->update(['deleted_at' => null]);

        return redirect()->route('dashboard.barang.halamanBarang');
    }

    public function hapus(int $id)
    {
        DB::table('barang')
            ->where('idbarang', $id)
            ->update(['deleted_at' => now()]);

        return redirect()->route('dashboard.barang.halamanBarang');
    }


}
