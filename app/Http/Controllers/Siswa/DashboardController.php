<?php

namespace App\Http\Controllers\Siswa;

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
        $user = Auth::id();
        $siswa = Siswa::where('user_id', $user)->first();
        $perkembangan = Perkembangan::where('siswa_id', $siswa->id)->get()->unique('aspek');
        return view('siswa.dashboard', compact('pageTitle', 'perkembangan', 'siswa'));
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $siswa = Siswa::find($id);
        $image = $request->file('image');
        $filePath = $image->storeAs('pasFoto', $image->getClientOriginalName(), 'public');
        $siswa->image = $filePath;
        $siswa->save();

        return back()->with('success', 'Image uploaded successfully.');
    }
}
