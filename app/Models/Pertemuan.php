<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;

    protected $fillable = ['kelas_id', 'judul', 'deskripsi', 'file'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function penilaian()
    {
        return $this->hasMany(PenilaianPertemuan::class);
    }
    public function tugas()
    {
        return $this->hasMany(TugasSiswa::class, 'pertemuan_id');
    }
}
