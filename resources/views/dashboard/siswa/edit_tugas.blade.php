{{-- @extends('layouts.siswa')

@section('title', 'Edit Tugas')

@section('content')
<div class="container">
    <h1 class="mb-4">Edit Tugas: {{ $pertemuan->judul }}</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ route('siswa.update.tugas', [$kelas->id, $pertemuan->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="file" class="form-label">Upload Tugas Baru (Opsional)</label>
                    <input type="file" name="file" class="form-control" id="file">
                </div>

                @if ($tugas->file)
                    <p>File saat ini: <a href="{{ url('tugas-files/' . $tugas->file) }}" download>{{ $tugas->file }}</a></p>
                @else
                    <p><em>Tidak ada file yang diupload.</em></p>
                @endif

                <button type="submit" class="btn btn-primary">Update Tugas</button>
            </form>
        </div>
    </div>

    <a href="{{ route('siswa.kelas.detail', $kelas->id) }}" class="btn btn-secondary mt-3">Kembali ke Kelas</a>
</div>
@endsection --}}


@extends('layouts.siswa')

@section('title', 'Edit Tugas'.$pertemuan->judul)

@section('content')
<div class="container mt-4">
    
            <form action="{{ route('siswa.update.tugas', [$kelas->id, $pertemuan->id, $tugas->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <!-- Input Upload Tugas Baru -->
                {{-- <div class="mb-3">
                    <label for="file" class="form-label">Upload Tugas Baru (Opsional)</label>
                    <input type="file" name="file" class="form-control" id="file">
                </div> --}}

                <!-- File Tugas Saat Ini -->
                @if ($tugas->file)
                    <p>File saat ini: 
                        <a href="{{ url('tugas-files/' . $tugas->file) }}" download class="btn btn-sm btn-outline-primary">
                            {{ $tugas->file }}
                        </a>
                    </p>
                @else
                    <p><em class="text-muted">Tidak ada file yang diupload.</em></p>
                @endif
                @if ($tugas->nilai)
                    <p>Nilai : 
                        <a>
                            {{ $tugas->nilai }}
                        </a>
                    </p>
                @else
                    <p><em class="text-muted">Belum di nilai.</em></p>
                @endif

                <!-- Tombol Update -->
                {{-- <button type="submit" class="btn btn-success">Update Tugas</button> --}}
            </form>

    <!-- Tombol Kembali ke Detail Kelas -->
    <a href="{{ route('siswa.kelas.detail', $kelas->id) }}" class="btn btn-secondary mt-3">
        Kembali ke Kelas
    </a>
</div>
@endsection
