<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Rekomendasi;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RekomendasiController extends Controller
{
    public function index()
    {
        $pageTitle = 'Rekomendasi';
        $rekomendasi = Rekomendasi::all()->unique('user_id');
        return view('admin.rekomendasi.view', compact('pageTitle', 'rekomendasi'));
    }

    public function detail($id)
    {
        $pageTitle = 'Rekomendasi Detail';
        $rekomendasi = Rekomendasi::where('user_id', $id)->get();
        return view('admin.rekomendasi.detail', compact('pageTitle', 'rekomendasi'));
    }

    public function delete($id)
    {
        Rekomendasi::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Rekomendasi berhasil dihapus.');
    }

    public function create(Request $request, $id)
    {
        $perkembangan = Perkembangan::where('id', $id)->first();
        $cek = Rekomendasi::where('perkembangan_id', $perkembangan->id)
            ->exists();
        $user = Siswa::where('id', $perkembangan->siswa_id)->first();
        if ($cek) {
            return redirect()->back()->with('error', 'Rekomendasi untuk aspek ini sudah ada.');
        }
        $rek = Rekomendasi::create([
            'user_id' => $user->user_id,
            'perkembangan_id' => $perkembangan->id,
            'catatan' => $request->catatan,
        ]);
        return redirect()->back()->with('success', 'Rekomendasi berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $rek = Rekomendasi::where('id', $id)->first();
        $rek->catatan = $request->catatan;
        $rek->save();
        return redirect()->back()->with('success', 'Rekomendasi berhasil diperbarui.');
    }
}
