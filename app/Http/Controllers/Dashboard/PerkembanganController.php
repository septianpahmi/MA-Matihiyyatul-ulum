<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;

class PerkembanganController extends Controller
{
    public function index()
    {
        $pageTitle = "Perkembangan";
        $perkembangan = Perkembangan::all()->unique('siswa_id');
        $siswa = User::where('role_id', 3)->get();
        return view('admin.perkembangan.view', compact('pageTitle', 'perkembangan', 'siswa'));
    }

    public function detail($id)
    {
        $pageTitle = "Perkembangan";
        $perkembangan = Perkembangan::where('siswa_id', $id)->with('siswa')
            ->orderBy('created_at', 'desc')
            ->get()
            ->groupBy(function ($item) {
                return $item->created_at->format('F Y');
            });
        return view('admin.perkembangan.detail', compact('pageTitle', 'perkembangan'));
    }

    public function delete($id)
    {
        $perkembangan = Perkembangan::where('siswa_id', $id)->get();
        foreach ($perkembangan as $item) {
            $item->delete();
        }
        return redirect()->route('perkembangan')->with('success', 'Data perkembangan berhasil dihapus.');
    }
    public function create(Request $request)
    {
        $user = User::findOrFail($request->siswa_id);
        $siswa = Siswa::where('user_id', $user->id)->firstOrFail();

        $last = Perkembangan::where('siswa_id', $siswa->id)
            ->orderBy('created_at', 'desc')
            ->first();

        if ($last && $last->created_at->diffInDays(now()) < 30) {
            return redirect()->back()->with('error', 'Perkembangan terakhir belum 1 bulan. Harap tunggu hingga cukup waktu.');
        }

        $aspekData = [
            'Kognitif' => ['nilai' => $request->kognitif],
            'Bahasa' => ['nilai' => $request->bahasa],
            'NAM' => ['nilai' => $request->nam],
            'Motorik' => ['nilai' => $request->motorik],
            'Seni' => ['nilai' => $request->seni],
            'Fisik' => ['nilai' => $request->fisik],
        ];

        foreach ($aspekData as $aspek => $data) {
            Perkembangan::create([
                'siswa_id' => $siswa->id,
                'aspek' => $aspek,
                'nilai' => $data['nilai'],
            ]);
        }

        return redirect()->route('perkembangan')->with('success', 'Data perkembangan siswa berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nilai' => 'required|in:BB,MB,BSH,BSB',
        ]);

        $perkembangan = Perkembangan::findOrFail($id);
        $perkembangan->nilai = $request->nilai;
        $perkembangan->save();

        return redirect()->back()->with('success', 'Data perkembangan berhasil diperbarui.');
    }
}
