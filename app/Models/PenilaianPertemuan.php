<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenilaianPertemuan extends Model
{
    use HasFactory;

    protected $fillable = ['pertemuan_id', 'siswa_id', 'nilai'];

    public function pertemuan()
    {
        return $this->belongsTo(Pertemuan::class);
    }

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id');
    }
}
