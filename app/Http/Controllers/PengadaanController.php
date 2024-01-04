<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PengadaanController extends Controller
{
    /**
     * Tampilkan list pengadaan.
     */
    public function list()
    {
        $list = DB::table('pengadaan')
            ->orderBy('timestamp', 'desc')
            ->get();

        return view('pages.dashboard.pengadaan.halaman-pengadaan', ['list' => $list]);
    }

    public function formTambah()
    {
        return view('pages.dashboard.pengadaan.form-tambah');
    }

    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'barang' => 'required|array',
            'barang.*.idbarang' => 'required|exists:barang,idbarang',
            'barang.*.jumlah' => 'required|integer|min:1',
            'vendor_idvendor' => 'required|exists:vendor,idvendor',
        ]);

        $idpengadaan = DB::table('pengadaan')->insert([
            'user_iduser' => auth()->id(),
            'sub_total' => 0,
            'ppn' => 0,
            'total_nilai' => 0,
            'status' => 1,
            'vendor_idvendor' => $validated['vendor_idvendor'],
            'created_at' => now(),
        ]);

        $totalPembelian = 0;
        foreach($validated['barang'] as $formBarang) {
            $barang = DB::table('barang')->where('idbarang', $formBarang['idbarang'])->first();

            DB::table('penjualan_detail')->insert([
                'idpengadaan' => $idpengadaan,
                'idbarang' => $formBarang['idbarang'],
                'harga_satuan' => $barang->harga,
                'jumlah' => $formBarang['jumlah'],
                'sub_total' => $subTotal = $barang->harga * $formBarang['jumlah'],
            ]);

            $totalPembelian += $subTotal;
        }

        DB::table('pengadaan')
            ->where('idpengadaan', $idpengadaan)
            ->update([
                'sub_total' => $totalPembelian,
                'ppn' => 11,
                'total_nilai' => $totalPembelian - round(($totalPembelian * 11 / 100)),
            ]);

        return redirect()
            ->route('dashboard.pengadaan.halamanPengadaan')
            ->with(['message' => ' Berhasil Simpan ' . $validated['id_pengadaan']]);

    }
}
