<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VendorController extends Controller
{
    public function halamanVendor() {
        // select * from `satuan`s
        $vendor = DB::table('vendor')->get();


        return view('pages.dashboard.vendor.halaman-vendor', [
            'vendor' => $vendor,
        ]);
    }


    public function formTambah()
    {
        return view('pages.dashboard.vendor.form-tambah');
    }

    /**
     * Buat data satuan.
     */
    public function tambah(Request $request)
    {
        $validated = $request->validate([
            'nama_vendor' => 'required|string|max:45',
            'badan_hukum' => 'required|string|max:1',
        ]);

        DB::table('vendor')->insert([
            'nama_vendor' => $validated['nama_vendor'],
            'badan_hukum' => $validated['badan_hukum'],
        ]);

        return redirect()
            ->route('dashboard.vendor.halamanVendor')
            ->with(['message' => ' Berhasil Simpan ' . $validated['nama_vendor']]);
    }


    public function formEdit(int $id)
    {
        $vendor = DB::table('vendor')->where('idvendor', $id)->first();
        return view('pages.dashboard.vendor.form-edit', ['vendor' => $vendor]);
    }

    /**
     * Buat data satuan.
     */
    public function edit(Request $request, int $id)
    {
        $validated = $request->validate([
            'nama_vendor' => 'required|string|max:45',
            'badan_hukum' => 'required|string|max:1',
        ]);

        DB::table('vendor')
        ->where('idvendor', $id)
        ->update([
            'nama_vendor' => $validated['nama_vendor'],
            'badan_hukum' => $validated['badan_hukum'],
        ]);

        return redirect()
            ->route('dashboard.vendor.halamanVendor')
            ->with(['message' => ' Edit ' . $validated['nama_vendor']]);
    }


    public function memulihkan (int $id)
    {
        DB::table('vendor')
            ->where('idvendor', $id)
            ->update(['deleted_at' => null]);

        return redirect()->route('dashboard.vendor.halamanVendor');
    }

    public function hapus (int $id)
    {
        DB::table('vendor')
            ->where('idvendor', $id)
            ->update(['deleted_at'=> now()]);

        return redirect()->route('dashboard.vendor.halamanVendor');
    }

    
}
