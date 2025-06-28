<?php

namespace App\Http\Controllers;

use App\Models\IqTest;
use App\Models\Siswa;
use App\Models\Rekomendasi;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $pageTitle = 'Laporan';
        $rekomendasi = Rekomendasi::all()->unique('user_id');
        return view('admin.laporan.view', compact('pageTitle', 'rekomendasi'));
    }
    public function indexIQ()
    {
        $pageTitle = 'Laporan';
        $iq = IqTest::all()->unique('siswa_id');
        return view('admin.laporan_iq.view', compact('pageTitle', 'iq'));
    }

    public function create(Request $request)
    {

        $month = date('m', strtotime($request->bulan));
        $year = date('Y', strtotime($request->bulan));

        $rekomendasi = Rekomendasi::where('user_id', $request->siswa)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();
        // dd($rekomendasi);
        if ($rekomendasi->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data dari bulan yang dipilih.');
        }
        $pageTitle = 'Laporan';
        return view('admin.laporan.result', compact('rekomendasi', 'pageTitle'));
    }

    public function createIQ(Request $request)
    {

        $month = date('m', strtotime($request->bulan));
        $year = date('Y', strtotime($request->bulan));

        $iq = IqTest::where('siswa_id', $request->siswa)
            ->whereMonth('created_at', $month)
            ->whereYear('created_at', $year)
            ->get();

        $total = $iq->sum('nilai');
        $nilaiRata = $iq->avg('nilai');
        // dd($rekomendasi);
        if ($iq->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data dari bulan yang dipilih.');
        }
        $pageTitle = 'Laporan';
        return view('admin.laporan_iq.result', compact('iq', 'pageTitle', 'nilaiRata', 'total'));
    }
}
