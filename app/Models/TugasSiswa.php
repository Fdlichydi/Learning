<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TugasSiswa extends Model
{
    use HasFactory;
    protected $fillable = ['siswa_id', 'kelas_id','pertemuan_id', 'file','nilai'];

    // public function siswa()
    // {
    //     return $this->belongsTo(User::class);
    //     // return $this->belongsTo(User::class, 'siswa_id');
    // }

    public function siswa()
{
    return $this->belongsTo(User::class, 'siswa_id');
}

public function pertemuan()
{
    return $this->belongsTo(Pertemuan::class, 'pertemuan_id');
}
public function kelas()
{
    return $this->belongsTo(Kelas::class, 'kelas_id');
}


    // public function pertemuan()
    // {
    //     return $this->belongsTo(Pertemuan::class);
    // }
}
