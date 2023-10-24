<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function halamanBarang(){
        $barang = DB::table('barang')->select('barang.*', 'nama_satuan')
        ->join('satuan', 'satuan.idsatuan', '=', 'barang.idsatuan')
        ->groupBy('idbarang')
        ->get();

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
    
        public function halamanSatuan() {
            
            $satuan = DB::table('satuan')->get();
    
    
            return view('pages.dashboard.satuan.halaman-satuan', [
                'satuan' => $satuan,
            ]);
        }
    
        
}
