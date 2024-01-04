<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaanController extends Controller
{
    public function penerimaan()
    {
        $penerimaan = DB::table('penerimaan')
            ->orderBy('timestamp', 'desc')
            ->get();

        return view('pages.dashboard.penerimaan.halaman-penerimaan', ['penerimaan' => $penerimaan]);
    }

    public function formTambah()
    {
        return view('pages.dashboard.penerimaan.form-tambah');
    }


    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'barang' => 'required|array',
            'barang.*.idbarang' => 'required|exists:barang,idbarang',
            'barang.*.jumlah_terima' => 'required|integer|min:1',
            'idpengadaan' => 'required|exists:pengadaan,idpengadaan',
        ]);

        // Insert data penerimaan dan dapatkan ID
        $idpenerimaan = DB::table('penerimaan')->insertGetId([
            'iduser' => auth()->id(),
            'sub_total_terima' => 0,
            'jumlah_terima' => 0,
            'total_nilai' => 0,
            'harga_satuan_terima' => 0,
            'created_at' => now(),
        ]);

        $totalPembelian = 0;

        foreach ($validated['barang'] as $formBarang) {
            $barang = DB::table('barang')->where('idbarang', $formBarang['idbarang'])->first();

            DB::table('penerimaan_detail')->insert([
                'idpenerimaan' => $idpenerimaan,
                'idbarang' => $formBarang['idbarang'],
                'harga_satuan_terima' => $barang->harga_satuan_terima,
                'jumlah_terima' => $formBarang['jumlah_terima'],
                'sub_total_terima' => $sub_total_terima = $barang->harga_satuan_terima * $formBarang['jumlah_terima'],
            ]);

            $totalPembelian += $sub_total_terima;
        }

        // Update data penerimaan dengan total pembelian yang sudah dihitung
        DB::table('penerimaan')
            ->where('idpenerimaan', $idpenerimaan)
            ->update([
                'sub_total_terima' => $totalPembelian,
                'jumlah_terima' => count($validated['barang']),
                'harga_satuan_terima' => $totalPembelian - round(($totalPembelian * 11 / 100)),
            ]);

        return redirect()
            ->route('dashboard.penerimaan.halamanPenerimaan')
            ->with(['message' => 'Berhasil Simpan']);

    }
}
