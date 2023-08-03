<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        // $pengaduans = Pengaduan::all();
        $pengaduans_with_tanggapan = Pengaduan::with('data_tanggapan')->get();
        if ($request->user()->level == 'masyarakat') {
            return view('dashboard', [
                'pengaduans' => $pengaduans_with_tanggapan
            ]);
        }
        if ($request->user()->level == 'admin') {
            return view('admin-dashboard', [
                'pengaduans' => $pengaduans_with_tanggapan
            ]);
        }
        if ($request->user()->level == 'petugas') {
            return view('petugas-dashboard', [
                'pengaduans' => $pengaduans_with_tanggapan
            ]);
        }
    }
}
