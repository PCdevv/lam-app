<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;

class TanggapanController extends Controller
{
    public function index()
    {
        return view('tanggapan-saya');
    }

    public function show(Request $request)
    {
        $tanggapans = Tanggapan::where('id_petugas', $request->user()->id_petugas)->get();
        return view('tanggapan-saya', [
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
}
