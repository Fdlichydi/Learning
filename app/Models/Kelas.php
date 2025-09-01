<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $fillable = ['nama_kelas', 'deskripsi', 'guru_id'];

     // Relasi Kelas memiliki banyak Pertemuan (One-to-Many)
     public function pertemuans()
     {
         return $this->hasMany(Pertemuan::class);
     }
     
    // Relasi ke guru (user dengan role guru)
    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }

    // Relasi ke siswa
    public function siswa()
    {
        return $this->belongsToMany(User::class, 'kelas_siswa', 'kelas_id', 'siswa_id');
    }

    public function tugas()
    {
        return $this->hasMany(TugasSiswa::class, 'kelas_id');
    }
}
