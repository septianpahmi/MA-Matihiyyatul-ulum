<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Models\Rekomendasi;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Models\RekomendasiFeedback;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PerkembanganController extends Controller
{
    public function index($id)
    {
        $pageTitle = 'Raport';
        $user = Auth::id();
        $siswa = Siswa::where('user_id', $user)->first();
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)->get()->unique('aspek');

        $per = Perkembangan::where('id', $id)->first();
        $rekomendasi = Rekomendasi::where('user_id', $user)->where('perkembangan_id', $per->id)->first();
        if (!$rekomendasi) {
            return redirect()->back()->with('error', 'Rekomendasi untuk aspek ini belum tersedia.');
        }
        return view('siswa.perkembangan.view', compact('pageTitle', 'perkembangan', 'per', 'rekomendasi', 'siswa'));
    }

    public function feedback(Request $request, $id)
    {
        $user = Auth::id();
        $rekomendasi = Rekomendasi::where('id', $id)->first();
        $feedback = RekomendasiFeedback::create([
            'rekomendasi_id' => $rekomendasi->id,
            'user_id' => $user,
            'catatan' => $request->catatan
        ]);
        return redirect()->back()->with('success', 'Catatan berhasil dikirim.');
    }
}
