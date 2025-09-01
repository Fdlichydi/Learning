{{-- @extends('layouts.siswa')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1>

        <!-- Daftar Guru -->
        <div class="mb-4">
            <h2>Guru Kelas</h2>
            <p>{{ $guru->name }}</p>
        </div>

        <!-- Daftar Pertemuan -->
        <div class="mb-4">
            <h2>Daftar Pertemuan</h2>
            <ul class="list-group">
                @foreach ($pertemuans as $pertemuan)
                    <li class="list-group-item">
                        <h5>{{ $pertemuan->judul }}</h5>
                        <p>{{ $pertemuan->deskripsi }}</p>
                        @if ($pertemuan->file)
                            <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>
                                Download File: {{ $pertemuan->file }}
                            </a>
                        @else
                            <small class="text-muted">Tidak ada file</small>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection --}}


{{-- @extends('layouts.siswa')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1>

        <!-- Daftar Guru -->
        <div class="mb-4">
            <h2>Guru Kelas</h2>
            <p>{{ $guru->name }}</p>
        </div>

        <!-- Daftar Pertemuan -->
        <div class="mb-4">
            <h2>Daftar Pertemuan</h2>
            <ul class="list-group">
                @foreach ($pertemuans as $pertemuan)
                    <li class="list-group-item">
                        <h5>{{ $pertemuan->judul }}</h5>
                        <p>{{ $pertemuan->deskripsi }}</p>

                        @if ($pertemuan->file)
                            <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>
                                Download File: {{ $pertemuan->file }}
                            </a>
                        @else
                            <small class="text-muted">Tidak ada file</small>
                        @endif

                        <!-- Form Upload Tugas -->
                        <form action="{{ route('siswa.uploadTugas', $pertemuan->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-3">
                                <label for="file_tugas">Upload Tugas:</label>
                                <input type="file" class="form-control" id="file_tugas" name="file_tugas" required>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Upload Tugas</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection --}}


{{-- @extends('layouts.siswa')

@section('title', 'Detail Kelas')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1>

    <!-- Daftar Guru -->
    <div class="mb-4">
        <h2>Guru Kelas</h2>
        <p>{{ $guru->name }}</p>
    </div>

    <!-- Daftar Pertemuan -->
    <div class="mb-4">
        <h2>Daftar Pertemuan</h2>
        <ul class="list-group">
            @foreach ($pertemuans as $pertemuan)
                <li class="list-group-item">
                    <h5>{{ $pertemuan->judul }}</h5>
                    <p>{{ $pertemuan->deskripsi }}</p>
                    @if ($pertemuan->file)
                        <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>
                            Download File: {{ $pertemuan->file }}
                        </a>
                    @else
                        <small class="text-muted">Tidak ada file</small>
                    @endif

                    <!-- Form Upload Tugas -->
                    <form action="{{ route('siswa.upload.tugas', [$kelas->id, $pertemuan->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="file" class="form-label">Upload Tugas</label>
                            <input type="file" name="file" class="form-control" id="file" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection --}}


{{-- @extends('layouts.siswa')

@section('title', 'Detail Kelas')

@section('content')
<div class="container">
    <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1>

    <!-- Daftar Guru -->
    <div class="mb-4">
        <h2>Guru Kelas</h2>
        <p>{{ $guru->name }}</p>
    </div>

    <!-- Daftar Pertemuan -->
    <div class="mb-4">
        <h2>Daftar Pertemuan</h2>
        <ul class="list-group">
            @foreach ($pertemuans as $pertemuan)
                <li class="list-group-item">
                    <h5>{{ $pertemuan->judul }}</h5>
                    <p>{{ $pertemuan->deskripsi }}</p>

                    @if ($pertemuan->file)
                        <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>
                            Download File: {{ $pertemuan->file }}
                        </a>
                    @else
                        <small class="text-muted">Tidak ada file</small>
                    @endif

                    <!-- Cek apakah siswa sudah meng-upload tugas -->
                    @php
                        $tugas = App\Models\TugasSiswa::where('siswa_id', Auth::id())
                                    ->where('kelas_id', $kelas->id)
                                    ->where('pertemuan_id', $pertemuan->id)
                                    ->first();
                    @endphp

                    @if ($tugas)
                        <!-- Jika sudah meng-upload tugas, tampilkan opsi edit dan hapus -->
                        <div class="mt-3">
                            <a href="{{ route('siswa.edit.tugas', [$kelas->id, $pertemuan->id, $tugas->id]) }}" class="btn btn-warning mt-2">Edit Tugas</a>
                            <form action="{{ route('siswa.deleteTugas', [$kelas->id, $pertemuan->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus tugas ini?')">Hapus Tugas</button>
                            </form>
                        </div>
                    @else
                        <!-- Form Upload Tugas -->
                            <form action="{{ route('siswa.upload.tugas', [$kelas->id, $pertemuan->id]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="file" class="form-label">Upload Tugas</label>
                                <input type="file" name="file" class="form-control" id="file" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Upload</button>
                        </form>
                    @endif
                </li>
            @endforeach
        </ul>
    </div>
</div>
@endsection --}}


@extends('layouts.siswa')

@section('title', 'Detail Kelas ' . $kelas->nama_kelas)

@section('content')
<div class="container mt-4">
   
            
            <!-- Guru Kelas -->
            <div class="mb-4">
                <h4>Guru Kelas</h4>
                <p class="lead">{{ $guru->name }}</p>
            </div>

            <!-- Daftar Pertemuan -->
            <div class="mb-4">
                <h4>Daftar Pertemuan</h4>
                @if ($pertemuans->isEmpty())
                    <p class="text-muted">Belum ada pertemuan di kelas ini.</p>
                @else
                    <ul class="list-group">
                        @foreach ($pertemuans as $pertemuan)
                            <li class="list-group-item">
                                <h5>{{ $pertemuan->judul }}</h5>
                                <p>{{ $pertemuan->deskripsi }}</p>

                                {{-- <!-- File Pertemuan -->
                                @if ($pertemuan->file)
                                    <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download class="btn btn-sm btn-secondary">
                                        Download File: {{ $pertemuan->file }}
                                    </a>
                                @else
                                    <small class="text-muted">Tidak ada file</small>
                                @endif --}}
                                @if ($pertemuan->file)
                                @php
                                    $extension = pathinfo($pertemuan->file, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array(strtolower($extension), ['mp4', 'webm', 'ogg']))
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('pertemuan-files/' . $pertemuan->file) }}"
                                            type="video/{{ $extension }}">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                @else
                                    <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}"
                                        download>{{ $pertemuan->file }}</a>
                                @endif
                            @endif

                                <!-- Cek apakah siswa sudah meng-upload tugas -->
                                @php
                                    $tugas = App\Models\TugasSiswa::where('siswa_id', Auth::id())
                                                ->where('kelas_id', $kelas->id)
                                                ->where('pertemuan_id', $pertemuan->id)
                                                ->first();
                                @endphp

                                <!-- Status Tugas -->
                                @if ($tugas)
                                    <!-- Tugas Sudah di-upload -->
                                    <div class="mt-3">
                                        <a href="{{ route('siswa.edit.tugas', [$kelas->id, $pertemuan->id, $tugas->id]) }}" class="btn btn-warning btn-sm">
                                            Lihat Tugas
                                        </a>
                                        <form action="{{ route('siswa.deleteTugas', [$kelas->id, $pertemuan->id]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin ingin menghapus tugas ini?')">Hapus Tugas</button>
                                        </form>
                                    </div>
                                @else
                                    <!-- Form Upload Tugas -->
                                    <form action="{{ route('siswa.upload.tugas', [$kelas->id, $pertemuan->id]) }}" method="POST" enctype="multipart/form-data" class="mt-3">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="file" class="form-label">Upload Tugas</label>
                                            <input type="file" name="file" class="form-control" id="file" required>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-sm">Upload</button>
                                    </form>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
</div>
@endsection
