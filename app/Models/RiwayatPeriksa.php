<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPeriksa extends Model
{
    use HasFactory;

    protected $table = 'riwayat_periksa'; // Nama tabel
    protected $fillable = [
        'id_pasien',
        'id_dokter',
        'tgl_periksa',
        'catatan',
        'biaya_periksa',
    ];

    // Relasi ke model User (Pasien)
    public function pasien()
    {
        return $this->belongsTo(User::class, 'id_pasien');
    }

    // Relasi ke model User (Dokter)
    public function dokter()
    {
        return $this->belongsTo(User::class, 'id_dokter');
    }
}
