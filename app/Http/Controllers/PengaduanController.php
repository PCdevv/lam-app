<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        return view('tulis-laporan');
    }

    public function show(Request $request)
    {
        $pengaduans = Pengaduan::where('nik', $request->user()->nik)->get();
        return view('laporan-saya', [
            'pengaduans' => $pengaduans,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);

        // !TODO
        $photo = $request->file('foto');
        $path = $photo->storeAs('public', 'pengaduan' . uniqid() . '.' . $photo->extension());
        $link = Storage::url($path);

        Pengaduan::create([
            'isi_laporan' => $request->isi_laporan,
            'nik' => $request->user()->nik,
            'foto' => $link,
            'status' => 'pending',
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    // public function update(Request $request, Pengaduan $pengaduan)
    // {
    // }

    public function destroy(Pengaduan $pengaduan)
    {
        $pengaduan->delete();
    }
}
