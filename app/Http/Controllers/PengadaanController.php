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
}
