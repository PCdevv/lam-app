<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;
    protected $fillable = [
        'foto',
        'isi_laporan',
        'status',
        'nik',
    ];
    public $timestamps = false;
    protected $primaryKey = 'id_pengaduan';

    public function data_tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }
}
