<?php

namespace App\Http\Controllers\Siswa;

use App\Models\Siswa;
use App\Models\IqTest;
use App\Models\Perkembangan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IqtestController extends Controller
{
    public function index()
    {
        $pageTitle = "Test IQ";
        $user = Auth::id();
        $siswa = Siswa::where('user_id', $user)->first();
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)->get()->unique('aspek');

        $iq = IqTest::where('siswa_id', $siswa->id)->get();
        return view('siswa.iqtest.view', compact('pageTitle', 'iq', 'perkembangan', 'siswa'));
    }
}
