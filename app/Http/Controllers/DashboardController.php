<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $pengaduans = Pengaduan::all();
        if ($request->user()->level == 'masyarakat') {
            return view('dashboard', [
                'pengaduans' => $pengaduans
            ]);
        }
        if ($request->user()->level == 'admin') {
            return view('admin-dashboard', [
                'pengaduans' => $pengaduans
            ]);
        }
        if ($request->user()->level == 'prtugas') {
            return view('petugas-dashboard', [
                'pengaduans' => $pengaduans
            ]);
        }
    }
}
