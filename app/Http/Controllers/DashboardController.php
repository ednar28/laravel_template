<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman beranda pada dashboard.
     */
    public function beranda()
    {
        return view('pages.dashboard.home.page-home');
    }
}
