<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\TugasSiswa;
use App\Models\User;
use Illuminate\Http\Request;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //  public function index(Request $request)
    // {
    //     // Query dasar untuk TugasSiswa
    //     $query = TugasSiswa::query();


    //      // Filter berdasarkan nama siswa
    //      if ($request->filled('siswa_id')) {
    //         $query->where('siswa_id', $request->siswa_id);
    //     }

    //     // Filter berdasarkan kelas
    //     if ($request->filled('kelas')) {
    //         $query->where('kelas_id', $request->kelas);
    //     }

    //     // Ambil semua data tugas dengan relasi siswa dan pertemuan
    //     $tugas = $query->with('siswa', 'pertemuan', 'kelas')->get();

    //     // Ambil semua kelas untuk filter dropdown
    //     $kelasList = Kelas::all();

    //      // Ambil semua siswa untuk filter dropdown
    //      $siswaList = User::whereHas('roles', function($q) {
    //         $q->where('name', 'siswa');
    //     })->get();

    //     return view('admin.tugas.index', compact('tugas', 'kelasList','siswaList'));
    // }

    public function index(Request $request)
{
    // Mendapatkan query filter dari request
    $namaSiswa = $request->input('nama_siswa');
    $kelas = $request->input('kelas');

    // Query dasar
    $query = TugasSiswa::with(['siswa', 'pertemuan']);

    // Jika filter nama siswa diisi
    if ($namaSiswa) {
        $query->whereHas('siswa', function($q) use ($namaSiswa) {
            $q->where('name', 'like', "%{$namaSiswa}%")->where('role', 'siswa');
        });
    }

    // Jika filter kelas diisi
    if ($kelas) {
        $query->where('kelas_id', $kelas);
    }

    $tugas = $query->get();

    // Ambil daftar siswa yang hanya memiliki role 'siswa'
    $siswaList = User::where('role', 'siswa')->get();
    $kelasList = Kelas::all();

    return view('admin.tugas.index', compact('tugas', 'siswaList', 'kelasList'));
}

    
    // public function index()
    // {
    //     $tugas = TugasSiswa::all();
    //     return view('admin.tugas.index', compact('tugas'));
    // }

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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
