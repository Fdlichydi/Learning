<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

class PertemuanController extends Controller
{
    // Menampilkan daftar pertemuan
    public function index()
    {
        $pertemuans = Pertemuan::all();
        return view('admin.pertemuan.index', compact('pertemuans'));
    }

    // Form tambah pertemuan
    public function create()
    {
        $kelas = Kelas::all();
        return view('admin.pertemuan.create', compact('kelas'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file',
        ]);

        $input = $request->all();

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '-' . $file->getClientOriginalName(); // Menambahkan timestamp untuk menghindari penimpaan file
            $file->move(public_path('pertemuan-files'), $fileName);
            $input['file'] = $fileName;
        }

        Pertemuan::create($input); // Gunakan $input untuk menyimpan data

        return redirect()->route('pertemuans.index')->with('success', 'Pertemuan berhasil ditambahkan.');
    }


    // Form edit pertemuan
    public function edit(Pertemuan $pertemuan)
    {
        return view('admin.pertemuan.edit', compact('pertemuan'));
    }

    // Mengupdate pertemuan
    public function update(Request $request, Pertemuan $pertemuan)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'file' => 'nullable|file',
        ]);

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
            // $fileName = $file->getClientOriginalName();
            $fileName = time() . '-' . $file->getClientOriginalName(); // Menambahkan timestamp untuk menghindari penimpaan file
            $file->move(public_path('pertemuan-files'), $fileName);
            $input['file'] = $fileName;
        }

        $pertemuan->update($input);
        return redirect()->route('pertemuans.index')->with('success', 'Pertemuan berhasil diupdate.');
    }

    // Menghapus pertemuan
    public function destroy(Pertemuan $pertemuan)
    {
        // Hapus file jika ada
        if ($pertemuan->file) {
            $filePath = public_path('pertemuan-files/' . $pertemuan->file);
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
        $pertemuan->delete();
        return redirect()->route('pertemuans.index')->with('success', 'Pertemuan berhasil dihapus.');
    }
}
