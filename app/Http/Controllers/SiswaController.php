<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\TugasSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        // Ambil data user (siswa) yang sedang login
        $user = Auth::user();

        // Ambil kelas yang diikuti siswa (misalkan ada relasi 'kelas' di model User atau Siswa)
        $kelas = $user->kelas1;  // Asumsi ada relasi 'kelas' di model 'User'

        return view('dashboard.siswa', compact('kelas', 'user'));
    }

    public function detailKelas($kelasId)
    {
        // Cari kelas berdasarkan ID
        $kelas = Kelas::with('guru', 'pertemuans')->findOrFail($kelasId);

        // Ambil data guru dan pertemuan di kelas tersebut
        $guru = $kelas->guru;  // Asumsi ada relasi 'guru' di model 'Kelas'
        $pertemuans = $kelas->pertemuans;  // Asumsi ada relasi 'pertemuans' di model 'Kelas'

        return view('dashboard.siswa.kelas_detail', compact('kelas', 'guru', 'pertemuans'));
    }
    // public function uploadTugas(Request $request, $kelasId, $pertemuanId)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx', // validasi tipe file
    //     ]);

    //     $kelas = Kelas::findOrFail($kelasId);
    //     $pertemuan = Pertemuan::findOrFail($pertemuanId);

    //     $input = $request->all();
    //     $input['user_id'] = Auth::id(); // Menghubungkan tugas dengan user yang login
    //     $input['kelas_id'] = $kelas->id; // Menghubungkan tugas dengan kelas
    //     $input['pertemuan_id'] = $pertemuan->id; // Menghubungkan tugas dengan pertemuan

    //     // Proses upload file
    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $fileName = time() . '-' . $file->getClientOriginalName();
    //         $file->move(public_path('tugas-files'), $fileName); // simpan file di folder tugas-files
    //         $input['file'] = $fileName;
    //     }

    //     TugasSiswa::create($input);

    //     return redirect()->route('siswa.kelas.detail', $kelasId)->with('success', 'Tugas berhasil diupload.');
    // }

    //     public function uploadTugas(Request $request, $kelasId, $pertemuanId)
    // {
    //     $request->validate([
    //         'file_tugas' => 'required|file',
    //     ]);

    //     $pertemuan = Pertemuan::findOrFail($pertemuanId);
    //     $user = Auth::user();  // Mengambil data user yang sedang login

    //     // Ambil file yang diupload
    //     $file = $request->file('file_tugas');
    //     $fileName = time() . '-' . $file->getClientOriginalName();
    //     $file->move(public_path('tugas-files'), $fileName);

    //     // Simpan tugas
    //     $tugas = new TugasSiswa();  // Asumsi ada model Tugas
    //     $tugas->pertemuan_id = $pertemuan->id;
    //     $tugas->siswa_id = $user->id;  // Menggunakan siswa_id dari user yang login
    //     $tugas->file_tugas = $fileName;
    //     $tugas->save();

    //     return redirect()->back()->with('success', 'Tugas berhasil diupload.');
    // }

    public function uploadTugas(Request $request, $kelasId, $pertemuanId)
    {
        $request->validate([
            'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx', // validasi tipe file
        ]);

        $kelas = Kelas::findOrFail($kelasId);
        $pertemuan = Pertemuan::findOrFail($pertemuanId);

        $input = $request->all();
        $input['siswa_id'] = Auth::id(); // Menghubungkan tugas dengan siswa yang login, gunakan siswa_id
        $input['kelas_id'] = $kelas->id; // Menghubungkan tugas dengan kelas
        $input['pertemuan_id'] = $pertemuan->id; // Menghubungkan tugas dengan pertemuan

        // Proses upload file
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('tugas-files'), $fileName); // simpan file di folder tugas-files
            $input['file'] = $fileName;
        }

        TugasSiswa::create($input); // Menyimpan input termasuk siswa_id ke tabel tugas_siswa

        return redirect()->route('siswa.kelas.detail', $kelasId)->with('success', 'Tugas berhasil diupload.');
    }

    // public function editTugas($kelasId, $pertemuanId)
    // {
    //     $tugas = TugasSiswa::where('siswa_id', Auth::id())
    //         ->where('kelas_id', $kelasId)
    //         ->where('pertemuan_id', $pertemuanId)
    //         ->firstOrFail();

    //     return view('dashboard.siswa.edit-tugas', compact('tugas', 'kelasId', 'pertemuanId'));
    // }

    // public function updateTugas(Request $request, $kelasId, $pertemuanId)
    // {
    //     $request->validate([
    //         'file' => 'required|file|mimes:pdf,doc,docx,ppt,pptx',
    //     ]);

    //     $tugas = TugasSiswa::where('siswa_id', Auth::id())
    //         ->where('kelas_id', $kelasId)
    //         ->where('pertemuan_id', $pertemuanId)
    //         ->firstOrFail();

    //     if ($request->hasFile('file')) {
    //         $file = $request->file('file');
    //         $fileName = time() . '-' . $file->getClientOriginalName();
    //         $file->move(public_path('tugas-files'), $fileName);

    //         // Hapus file lama jika ada
    //         if ($tugas->file) {
    //             unlink(public_path('tugas-files/' . $tugas->file));
    //         }

    //         $tugas->file = $fileName;
    //     }

    //     $tugas->save();

    //     return redirect()->route('siswa.kelas.detail', $kelasId)->with('success', 'Tugas berhasil diperbarui.');
    // }

    public function editTugas($kelasId, $pertemuanId, $tugasId)
{
    $kelas = Kelas::findOrFail($kelasId);
    $pertemuan = Pertemuan::findOrFail($pertemuanId);
    $tugas = TugasSiswa::where('id', $tugasId)
        ->where('siswa_id', Auth::id())
        ->where('kelas_id', $kelasId)
        ->where('pertemuan_id', $pertemuanId)
        ->firstOrFail();

    return view('dashboard.siswa.edit_tugas', compact('kelas', 'pertemuan', 'tugas'));
}
public function updateTugas(Request $request, $kelasId, $pertemuanId, $tugasId)
{
    $request->validate([
        'file' => 'file|mimes:pdf,doc,docx,ppt,pptx', // validasi tipe file
    ]);

    $tugas = TugasSiswa::where('id', $tugasId)
        ->where('siswa_id', Auth::id())
        ->where('kelas_id', $kelasId)
        ->where('pertemuan_id', $pertemuanId)
        ->firstOrFail();

    // Cek apakah ada file baru yang di-upload
    if ($request->hasFile('file')) {
        // Hapus file lama
        if ($tugas->file) {
            $oldFilePath = public_path('tugas-files/' . $tugas->file);
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Upload file baru
        $file = $request->file('file');
        $fileName = time() . '-' . $file->getClientOriginalName();
        $file->move(public_path('tugas-files'), $fileName);

        // Simpan nama file baru
        $tugas->file = $fileName;
    }

    $tugas->save();

    return redirect()->route('siswa.kelas.detail', $kelasId)->with('success', 'Tugas berhasil diupdate.');
}



    public function deleteTugas($kelasId, $pertemuanId)
    {
        $tugas = TugasSiswa::where('siswa_id', Auth::id())
            ->where('kelas_id', $kelasId)
            ->where('pertemuan_id', $pertemuanId)
            ->firstOrFail();

        // Hapus file
        if ($tugas->file) {
            unlink(public_path('tugas-files/' . $tugas->file));
        }

        $tugas->delete();

        return redirect()->route('siswa.kelas.detail', $kelasId)->with('success', 'Tugas berhasil dihapus.');
    }
}
