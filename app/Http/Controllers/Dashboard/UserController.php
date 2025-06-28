<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function siswa()
    {
        $pageTitle = 'Kelola Siswa';
        $data = User::where('role_id', 3)->get();
        $siswa = siswa::whereIn('user_id', $data->pluck('id'))->get();
        return view('admin.pengguna.siswa', compact('pageTitle', 'siswa'));
    }

    public function siswaDelete($id)
    {
        $siwa = Siswa::find($id);
        $siwa->delete();

        $user = User::find($siwa->user_id);
        $user->delete();
        return redirect()->route('siswa')->with('success', 'Siswa berhasil dihapus.');
    }

    public function siswaCreate(Request $request)
    {
        if (User::where('nis', $request->nis)->exists()) {
            return redirect()->back()->with('error', 'NIS sudah terdaftar.');
        }
        $user = User::create([
            'name' => $request->name,
            'nis' => $request->nis,
            'password' => bcrypt($request->password),
            'password_plain' => $request->password,
            'role_id' => 3
        ]);
        $siswa = Siswa::create([
            'user_id' => $user->id,
            'kelas' => $request->kelas,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil ditambahkan.');
    }
    public function siswaUpdate(Request $request, $id)
    {
        $siswa = Siswa::find($id);
        $user = User::find($siswa->user_id);
        // dd($user->id, $request->nis, User::where('nis', $request->nis)->get());
        // $request->validate([
        //     'name' => 'required|string|max:255',
        //     'nis' => 'required|string|max:60|unique:users,nis,' . $user->id, // penting!
        //     'password' => 'nullable|string|min:6',
        //     'kelas' => 'required|string|max:100',
        //     'gender' => 'required|in:Laki-Laki,Perempuan',
        //     'tempat_lahir' => 'required|string|max:30',
        //     'tanggal_lahir' => 'required|date',
        // ]);
        $user->name = $request->name;
        $user->nis = $request->nis;
        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
            $user->password_plain = $request->password;
        }
        $user->role_id = 3;
        $user->save();
        $siswa->update([
            'kelas' => $request->kelas,
            'gender' => $request->gender,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir
        ]);

        return redirect()->route('siswa')->with('success', 'Siswa berhasil diubah.');
    }
    public function guru()
    {
        $pageTitle = 'Kelola Guru';
        $guru = User::where('role_id', 2)->get();
        return view('admin.pengguna.guru', compact('pageTitle', 'guru'));
    }

    public function guruDelete($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('guru')->with('success', 'Siswa berhasil dihapus.');
    }

    public function guruCreate(Request $request)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'password_plain' => $request->password,
            'role_id' => 2
        ]);
        return redirect()->route('guru')->with('success', 'Guru berhasil ditambahkan.');
    }
    public function guruUpdate(Request $request, $id)
    {
        if (User::where('email', $request->email)->exists()) {
            return redirect()->back()->with('error', 'Email sudah terdaftar.');
        }
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->password_plain = $request->password;
        $user->role_id = 2;
        $user->save();
        return redirect()->route('guru')->with('success', 'Guru berhasil diubah.');
    }
}
