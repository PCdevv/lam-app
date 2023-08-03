<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index(Request $request)
    {
        $pengaduans = Pengaduan::where('nik', $request->user()->nik)->get();
        return view('pengaduan.index', [
            'pengaduans' => $pengaduans,
        ]);
    }

    // public function show(Request $request)
    // {

    // }

    public function create()
    {
        return view('pengaduan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'isi_laporan' => 'required',
            'foto' => 'required',
        ]);

        // !TODO
        $photo = $request->file('foto');
        $path = $photo->storeAs('public/images', 'pengaduan_' . uniqid() . '.' . $photo->extension());
        $link = Storage::url($path);

        Pengaduan::create([
            'isi_laporan' => $request->isi_laporan,
            'nik' => $request->user()->nik,
            'foto' => $link,
            'status' => 'pending',
        ]);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    public function edit(string $id_pengaduan)
    {
        // $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        return view('pengaduan.edit', ['pengaduan' => $pengaduan]);
    }

    public function update(Request $request, string $id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);
        $pengaduan->update($request->all());

        return redirect()->intended('/laporan-saya');
    }

    public function destroy(string $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan);
        $pengaduan->delete();

        return redirect('/laporan-saya');
    }
}
