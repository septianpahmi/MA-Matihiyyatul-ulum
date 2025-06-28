<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pageTitle = 'Dashboard';
        $siswa = User::where('role_id', 3)->count();
        $guru = User::where('role_id', 2)->count();
        return view('admin.dashboard', compact('pageTitle', 'siswa', 'guru'));
    }
}
