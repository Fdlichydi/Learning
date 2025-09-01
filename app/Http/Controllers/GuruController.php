<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PenilaianPertemuan;
use App\Models\Pertemuan;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{

    public function index()
    {
        // Ambil data user (guru) yang sedang login
        $user = Auth::user();

        // Ambil kelas yang diajarkan oleh guru
        $kelas = $user->kelas;  // Asumsi ada relasi 'kelas' di model 'User'

        return view('dashboard.guru', compact('kelas'));
    }

    public function detailKelas($kelasId)
    {
        // Cari kelas berdasarkan ID
        $kelas = Kelas::with('siswa', 'pertemuans')->findOrFail($kelasId);

        // Ambil data siswa dan pertemuan di kelas tersebut
        $siswa = $kelas->siswa;  // Asumsi ada relasi 'siswa' di model 'Kelas'
        $pertemuans = $kelas->pertemuans;  // Asumsi ada relasi 'pertemuans' di model 'Kelas'

        return view('dashboard.guru.kelas_detail', compact('kelas', 'siswa', 'pertemuans'));
    }

    public function addPertemuan(Request $request, $kelasId)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'file' => 'nullable|file',
    ]);

    $kelas = Kelas::findOrFail($kelasId);
    $input = $request->all();
    $input['kelas_id'] = $kelas->id; // Tambahkan kelas_id untuk menghubungkan pertemuan dengan kelas

    if ($request->hasFile('file')) {
        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('pertemuan-files'), $fileName);
        $input['file'] = $fileName;
    }

    Pertemuan::create($input);

    return redirect()->route('guru.kelas.detail', $kelasId)->with('success', 'Pertemuan berhasil ditambahkan.');
}
public function editPertemuan($kelasId, $pertemuanId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $pertemuan = Pertemuan::findOrFail($pertemuanId);

    return view('dashboard.guru.edit_pertemuan', compact('kelas', 'pertemuan'));
}

public function updatePertemuan(Request $request, $kelasId, $pertemuanId)
{
    $request->validate([
        'judul' => 'required|string|max:255',
        'deskripsi' => 'nullable|string',
        'file' => 'nullable|file',
    ]);

    $pertemuan = Pertemuan::findOrFail($pertemuanId);
    $input = $request->all();

    if ($request->hasFile('file')) {
        // Hapus file lama jika ada
        if ($pertemuan->file) {
            $oldFilePath = public_path('pertemuan-files/' . $pertemuan->file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('pertemuan-files'), $fileName);
        $input['file'] = $fileName;
    }

    $pertemuan->update($input);

    return redirect()->route('guru.kelas.detail', $kelasId)->with('success', 'Pertemuan berhasil diupdate.');
}

public function deletePertemuan($kelasId, $pertemuanId)
{
    $pertemuan = Pertemuan::findOrFail($pertemuanId);

    // Hapus file jika ada
    if ($pertemuan->file) {
        $filePath = public_path('pertemuan-files/' . $pertemuan->file);
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

    $pertemuan->delete();

    return redirect()->route('guru.kelas.detail', $kelasId)->with('success', 'Pertemuan berhasil dihapus.');
}

// public function showPenilaian($kelasId, $pertemuanId)
// {
//     $kelas = Kelas::findOrFail($kelasId);
//     $pertemuan = Pertemuan::findOrFail($pertemuanId);
//     $siswa = $kelas->siswa; // Ambil siswa yang terdaftar di kelas
//     $tugas = [];

//     foreach ($siswa as $s) {
//         $tugas[$s->id] = TugasSiswa::where('pertemuan_id', $pertemuanId)
//             ->where('siswa_id', $s->id)
//             ->first();
//     }

//     return view('dashboard.guru.penilaian', compact('kelas', 'pertemuan', 'siswa', 'tugas'));
// }


public function showPenilaian($kelasId, $pertemuanId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $pertemuan = Pertemuan::findOrFail($pertemuanId);
    $siswa = $kelas->siswa; // Ambil siswa yang terdaftar di kelas
    
    // Ambil nilai tugas siswa untuk pertemuan ini jika ada
    $tugas = TugasSiswa::where('pertemuan_id', $pertemuanId)->get()->keyBy('siswa_id');

    return view('dashboard.guru.penilaian', compact('kelas', 'pertemuan', 'siswa', 'tugas'));
}


// public function storeOrUpdate(Request $request, $pertemuanId)
// {
//     $data = $request->validate([
//         'nilai' => 'array',
//         'nilai.*' => 'required|integer|min:0|max:100',
//     ]);

//     foreach ($data['nilai'] as $siswaId => $nilai) {
//         // Simpan atau update penilaian siswa
//         PenilaianPertemuan::updateOrCreate(
//             ['siswa_id' => $siswaId, 'pertemuan_id' => $pertemuanId],
//             ['nilai' => $nilai]
//         );
//     }

//     return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
// }




}
