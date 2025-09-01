<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KelasSiswa extends Model
{
    use HasFactory;

    protected $table = 'kelas_siswa';

    protected $fillable = ['kelas_id', 'siswa_id'];

    public function siswa()
    {
        return $this->belongsTo(User::class, 'siswa_id','kelas_id');
    }

}
