<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\User;
use App\Models\IqTest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Siswa;

class IqController extends Controller
{
    public function index()
    {
        $pageTitle = "Test IQ";
        $iq = IqTest::all();
        $siswa = User::where('role_id', 3)->get();
        return view('admin.iq.view', compact('pageTitle', 'iq', 'siswa'));
    }

    public function delete($id)
    {
        $iq = IqTest::find($id);
        $iq->delete();
        return redirect()->route('testiq')->with('success', 'Data Test IQ berhasil dihapus.');
    }

    public function create(Request $request)
    {
        $user = User::where('id', $request->siswa_id)->first();
        $siswa = Siswa::where('user_id', $user->id)->first();
        if (!$siswa) {
            return redirect()->back()->with('error', 'Data siswa tidak ditemukan.');
        }
        $cek = IqTest::where('aspek', $request->aspek)->exists();
        if ($cek) {
            return redirect()->back()->with('error', 'Data Test IQ untuk siswa ini sudah ada.');
        }
        // dd($siswa);
        $iq = new IqTest;
        $iq->siswa_id = $siswa->id;
        $iq->aspek = $request->aspek;
        $iq->catatan = $request->catatan;
        $iq->save();
        return redirect()->route('testiq')->with('success', 'Data Test IQ berhasil disimpan.');
    }

    public function update(Request $request, $id)
    {
        $iq = IqTest::find($id);
        $iq->update([
            'aspek' => $request->aspek,
            'catatan' => $request->catatan,
        ]);
        return redirect()->route('testiq')->with('success', 'Data Test IQ berhasil diubah.');
    }
}
