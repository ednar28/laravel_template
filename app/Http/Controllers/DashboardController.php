<?php

namespace App\Http\Controllers;

use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Tampilkan halaman beranda pada dashboard.
     */
    public function beranda()
    {
        $usersCount = User::count();

        return view('pages.dashboard.home.page-home', [
            'usersCount' => $usersCount,
        ]);
    }
}
