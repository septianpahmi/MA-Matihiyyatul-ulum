<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Models\Rekomendasi;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RekomendasiController extends Controller
{
    public function index()
    {
        $pageTitle = "Rekomendasi";
        $user = Auth::id();
        $siswa = Siswa::where('user_id', $user)->first();
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)->get()->unique('aspek');

        $rekomendasi = Rekomendasi::where('user_id', $user)->get();
        return view('siswa.rekomendasi.view', compact('pageTitle', 'perkembangan', 'rekomendasi', 'siswa'));
    }
}
