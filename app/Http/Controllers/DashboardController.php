<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Get halaman home pada dashboard.
     */
    public function home()
    {
        return view('pages.dashboard.home.page-home');
    }
}
