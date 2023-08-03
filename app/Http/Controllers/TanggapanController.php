<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index(Request $request)
    {
        $tanggapans = Tanggapan::where('id_petugas', $request->user()->id)->with('data_pengaduan')->get();
        $pengaduans = Pengaduan::all();
        return view('tanggapan.index', [
            'tanggapans' => $tanggapans,
            'pengaduans' => $pengaduans,
        ]);
    }

    public function create(string $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();
        return view('tanggapan.create', [
            'pengaduan' => $pengaduan,
        ]);
    }

    public function store(Request $request, string $id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id_pengaduan)->first();

        $request->validate([
            'status' => 'required',
            'tanggapan' => 'required',
        ]);

        Tanggapan::create([
            'id_pengaduan' => $request->id_pengaduan,
            'tanggapan' => $request->tanggapan,
            'id_petugas' => $request->user()->id,
        ]);

        $pengaduan->status = $request->status;
        $pengaduan->save();

        return redirect()->intended('/tanggapan-saya');
    }

    public function edit(Request $request, string $id_tanggapan)
    {
        // dd($request->id_pengaduan);
        // $tanggapan = Tanggapan::findOrFail($id_tanggapan);
        $tanggapan = Tanggapan::where('id_tanggapan', $id_tanggapan)->with('data_pengaduan')->first();
        return view('tanggapan.edit', [
            'tanggapan' => $tanggapan
        ]);
    }

    public function update(Request $request, string $id_tanggapan)
    {
        // dd([$id_tanggapan, $request->id_pengaduan]);
        $request->validate([
            'status' => 'required',
            'tanggapan' => 'required',
        ]);

        $tanggapan = Tanggapan::findOrFail($id_tanggapan);

        if (is_null($tanggapan)) {
            return redirect()->back()->with('error', 'Tanggapan not found.');
        }
        // return $tanggapan;
        $tanggapan->tanggapan = $request->tanggapan;
        $tanggapan->save();

        $pengaduan = Pengaduan::where('id_pengaduan', $tanggapan->id_pengaduan)->first();
        if ($pengaduan) {
            $pengaduan->status = $request->status;
            $pengaduan->save();
        }

        return redirect()->intended('/tanggapan-saya');
    }

    public function destroy(string $id_tanggapan)
    {
        $tanggapan = Tanggapan::findOrFail($id_tanggapan);
        $tanggapan->delete();

        return redirect('/tanggapan-saya');
    }
}
