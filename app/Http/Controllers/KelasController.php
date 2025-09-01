<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\PenilaianPertemuan;
use App\Models\User;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    // Menampilkan daftar kelas
    public function index()
    {
        $kelas = Kelas::with('guru')->get();
        return view('admin.kelas.index', compact('kelas'));
    }

    // Form tambah kelas
    public function create()
    {
        $guru = User::where('role', 'guru')->get(); // Ambil semua user dengan role guru
        return view('admin.kelas.create', compact('guru'));
    }

    // Menyimpan kelas
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'guru_id' => 'required|exists:users,id',
            'deskripsi' => 'nullable|string',
        ]);

        Kelas::create($request->all());
        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
    }

    // Menambahkan siswa ke dalam kelas
    public function addSiswa(Request $request, $kelasId)
    {
        $kelas = Kelas::find($kelasId);
        $siswa = User::where('role', 'siswa')->get(); // Ambil semua siswa
        $siswaTerdaftar = $kelas->siswa; // Ambil siswa yang sudah terdaftar di kelas

        return view('admin.kelas.add_siswa', compact('kelas', 'siswa', 'siswaTerdaftar'));
    }


    // public function storeSiswa(Request $request, $kelasId)
    // {
    //     $kelas = Kelas::find($kelasId);
    //     $kelas->siswa()->sync($request->siswa_id); // Menyimpan banyak siswa sekaligus

    //     return redirect()->route('kelas.index')->with('success', 'Siswa berhasil ditambahkan ke kelas.');
    // }

    public function storeSiswa(Request $request, $kelasId)
    {
        $kelas = Kelas::find($kelasId);

        // Ambil ID siswa yang sudah terdaftar di kelas
        $siswaTerdaftar = $kelas->siswa()->pluck('siswa_id')->toArray();

        // Gabungkan siswa yang sudah terdaftar dengan siswa yang baru ditambahkan
        $siswaBaru = $request->siswa_id;

        // Pastikan hanya siswa yang belum terdaftar yang ditambahkan
        $siswaUntukDisimpan = array_unique(array_merge($siswaTerdaftar, $siswaBaru));

        // Simpan daftar siswa tanpa menghapus yang lama
        $kelas->siswa()->sync($siswaUntukDisimpan);

        return redirect()->route('kelas.addSiswa', $kelasId)->with('success', 'Siswa berhasil ditambahkan ke kelas.');
    }

    public function removeSiswa($kelasId, $siswaId)
    {
        $kelas = Kelas::findOrFail($kelasId);
        $kelas->siswa()->detach($siswaId); // Menghapus siswa dari kelas

        // Hapus nilai penilaian terkait siswa ini dari semua pertemuan
        PenilaianPertemuan::where('siswa_id', $siswaId)->delete();

        return redirect()->route('kelas.addSiswa', $kelasId)->with('success', 'Siswa berhasil dihapus dari kelas.');
    }

    public function show($id)
    {
        $kelas = Kelas::with('guru', 'siswa')->findOrFail($id);
        return view('admin.kelas.show', compact('kelas'));
    }
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = User::where('role', 'guru')->get(); // Ambil data guru
        return view('admin.kelas.edit', compact('kelas', 'guru'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'guru_id' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Kelas berhasil dihapus.');
    }
}
