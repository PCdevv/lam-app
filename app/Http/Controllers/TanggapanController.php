<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index(Request $request)
    {
        $tanggapans = Tanggapan::where('id_petugas', $request->user()->id_petugas)->get();
        return view('tanggapan.index', [
            'tanggapans' => $tanggapans,
        ]);
    }

    public function show(Request $request)
    {
        $tanggapans = Tanggapan::where('id_petugas', $request->user()->id_petugas)->get();
        return view('tanggapan.index', [
            'tanggapans' => $tanggapans,
        ]);
    }

    public function store(Request $request)
    {

        $pengaduan = Pengaduan::where('id_pengaduan', $request->id_pengaduan)->first();

        $tanggapanData = Tanggapan::create([
            'id_pengaduan' => $pengaduan->id_pengaduan,
            'tanggapan' => $request->tanggapan,
            'id_petugas' => $request->user()->id,
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->id_tanggapan = $tanggapanData->id_tanggapan;
        $pengaduan->save();
    }

    public function edit(string $id)
    {
        $users = Tanggapan::all();
        $user = Tanggapan::findOrFail($id);
        return view('tanggapan.index', [
            'users' => $users,
            'user' => $user,
        ]);
    }

    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'nama_lengkap' => 'required',
            'telp' => 'required',
            'level' => 'required',
            'email' => ['required', 'string', 'email', 'max:255']
        ]);

        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->update($request->all());

        return redirect()->intended('/kelola-pengguna');
    }

    public function destroy(string $id)
    {
        $tanggapan = Tanggapan::findOrFail($id);
        $tanggapan->delete();

        return redirect('/tanggapan-saya');
    }
}
