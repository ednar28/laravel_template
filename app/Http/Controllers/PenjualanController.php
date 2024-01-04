<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Tampilkan halaman list penjualan.
     */
    public function halamanPenjualan()
    {
        $list = DB::table('penjualan')->get();
        $users = DB::table('users')->whereIn('iduser', $list->pluck('iduser'))->get();

        return view('pages.dashboard.penjualan.halaman-penjualan', [
            'list' => $list,
            'users' => $users,
        ]);
    }

    /**
     * Tampilkan form tambah untuk penjualan.
     */
    public function formTambah()
    {
        $barang = DB::table('barang')->get();

        return view('pages.dashboard.penjualan.form-tambah', ['barang' => $barang]);
    }

    /**
     * Simpan penjualan.
     */
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'barang' => 'required|array',
            'barang.*.idbarang' => 'required|exists:barang,idbarang',
            'barang.*.jumlah' => 'required|integer|min:1',
        ]);

        $idpenjualan = DB::table('penjualan')->insertGetId([
            'iduser' => auth()->id(),
            'sub_total' => 0,
            'ppn' => 0,
            'total_nilai' => 0,
            'created_at' => now(),
        ]);

        $totalPembelian = 0;
        foreach($validated['barang'] as $formBarang) {
            $barang = DB::table('barang')->where('idbarang', $formBarang['idbarang'])->first();

            DB::table('penjualan_detail')->insert([
                'penjualan_idpenjualan' => $idpenjualan,
                'idbarang' => $formBarang['idbarang'],
                'harga_satuan' => $barang->harga,
                'jumlah' => $formBarang['jumlah'],
                'sub_total' => $subTotal = $barang->harga * $formBarang['jumlah'],
            ]);

            $totalPembelian += $subTotal;
        }

        DB::table('penjualan')
            ->where('idpenjualan', $idpenjualan)
            ->update([
                'sub_total' => $totalPembelian,
                'ppn' => 11,
                'total_nilai' => $totalPembelian - round(($totalPembelian * 11 / 100)),
            ]);

        return redirect()
            ->route('dashboard.penjualan.halamanPenjualan')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama_penjualan']]);
    }
}
