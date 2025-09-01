<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PenilaianPertemuan;
use App\Models\Pertemuan;
use App\Models\TugasSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class PenilaianPertemuanController extends Controller
{
    // public function penilaianForm($kelasId, $pertemuanId)
    // {
    //     $kelas = Kelas::findOrFail($kelasId);
    //     $pertemuan = Pertemuan::findOrFail($pertemuanId);
    //     $siswa = $kelas->siswa;

    //     // Ambil nilai penilaian yang ada
    //     $nilaiSiswa = PenilaianPertemuan::where('pertemuan_id', $pertemuanId)
    //         ->pluck('nilai', 'siswa_id');

    //     return view('penilaian.pertemuan', compact('kelas', 'pertemuan', 'siswa', 'nilaiSiswa'));
    // }

    // public function simpanPenilaian(Request $request, $kelasId, $pertemuanId)
    // {
    //     $request->validate([
    //         'nilai' => 'required|array',
    //         'nilai.*' => 'required|integer|min:0|max:100',
    //     ]);

    //     foreach ($request->nilai as $siswaId => $nilai) {
    //         PenilaianPertemuan::updateOrCreate(
    //             ['pertemuan_id' => $pertemuanId, 'siswa_id' => $siswaId],
    //             ['nilai' => $nilai]
    //         );
    //     }

    //     return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    // }
    // public function storeOrUpdate(Request $request, $pertemuanId)
    // {
    //     $pertemuan = Pertemuan::findOrFail($pertemuanId);
    //     $siswaNilai = $request->input('nilai'); // Mendapatkan input nilai siswa

    //     foreach ($siswaNilai as $siswaId => $nilai) {
    //         // Cari atau buat penilaian baru untuk siswa ini dan pertemuan terkait
    //         $penilaian = PenilaianPertemuan::updateOrCreate(
    //             ['pertemuan_id' => $pertemuanId, 'siswa_id' => $siswaId],
    //             ['nilai' => $nilai]
    //         );
    //     }

    //     return redirect()->back()->with('success', 'Nilai berhasil disimpan atau diupdate.');
    // }

    // public function storeOrUpdate(Request $request, $pertemuanId)
    // {
    //     $data = $request->validate([
    //         'nilai' => 'array',
    //         'nilai.*' => 'required|integer|min:0|max:100',
    //     ]);

    //     foreach ($data['nilai'] as $siswaId => $nilai) {
    //         // Simpan atau update penilaian siswa
    //         TugasSiswa::updateOrCreate(
    //             ['siswa_id' => $siswaId, 'pertemuan_id' => $pertemuanId],
    //             ['nilai' => $nilai]
    //         );
    //     }

    //     return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    // }

    public function storeOrUpdate(Request $request, $pertemuanId)
{
    // Validasi input dari form
    $data = $request->validate([
        'nilai' => 'array',
        'nilai.*' => 'required|integer|min:0|max:100',
    ]);

    // Temukan pertemuan dan ambil kelas_id terkait
    $pertemuan = Pertemuan::findOrFail($pertemuanId);
    $kelasId = $pertemuan->kelas_id; // Ambil kelas_id dari pertemuan

    foreach ($data['nilai'] as $siswaId => $nilai) {
        // Temukan atau buat tugas siswa berdasarkan siswa_id dan pertemuan_id
        $tugas = TugasSiswa::firstOrNew(
            ['siswa_id' => $siswaId, 'pertemuan_id' => $pertemuanId],
            ['kelas_id' => $kelasId] // Sertakan kelas_id jika diperlukan
        );

        // Update nilai
        $tugas->nilai = $nilai;

        // Simpan data tugas siswa
        $tugas->save();
    }

    // return redirect()->back()->with('success', 'Penilaian berhasil disimpan.');
    return redirect()->route('guru.kelas.detail', $kelasId)->with('success', 'Penilaian berhasil di simpan.');
}


    // public function showPenilaian($pertemuanId)
    // {
    //     $pertemuan = Pertemuan::findOrFail($pertemuanId);
    //     $siswa = User::whereHas('kelas', function ($query) use ($pertemuan) {
    //         $query->where('id', $pertemuan->kelas_id);
    //     })->get();

    //     // Dapatkan nilai penilaian yang ada
    //     $nilaiSiswa = PenilaianPertemuan::where('pertemuan_id', $pertemuanId)
    //         ->pluck('nilai', 'siswa_id');

    //     return view('penilaian.pertemuan', compact('pertemuan', 'siswa', 'nilaiSiswa'));
    // }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PenilaianPertemuan $penilaianPertemuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenilaianPertemuan $penilaianPertemuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PenilaianPertemuan $penilaianPertemuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PenilaianPertemuan $penilaianPertemuan)
    {
        //
    }
}
