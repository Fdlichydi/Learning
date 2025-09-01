{{-- @extends('layouts.guru')

@section('title', 'Detail Kelas')

@section('content')
    <div class="container">
        <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1>

        <div class="row">
            <!-- Form Tambah Pertemuan -->
        <div class="row mt-4">
            <div class="col-md-12">
                <h3>Tambah Pertemuan Baru</h3>
                <form action="{{ route('guru.kelas.addPertemuan', $kelas->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul Pertemuan</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File (Optional)</label>
                        <input type="file" class="form-control" id="file" name="file">
                    </div>
                    <button type="submit" class="btn btn-success">Tambah Pertemuan</button>
                </form>
            </div>
        </div>
            <!-- Daftar Pertemuan -->
            <div class="col-md-6">
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
                            <a href="{{ route('guru.penilaian', [$kelas->id, $pertemuan->id]) }}" class="btn btn-warning mt-2">Penilaian</a>

                            <!-- Tombol Edit -->
                            <a href="{{ route('guru.kelas.editPertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}"
                               class="btn btn-sm btn-warning">
                                Edit
                            </a>

                            <!-- Tombol Hapus -->
                            <form action="{{ route('guru.kelas.deletePertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}"
                                  method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pertemuan ini?')">
                                    Hapus
                                </button>
                            </form>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Daftar Siswa -->
            <div class="col-md-6">
                <h2>Daftar Siswa</h2>
                <ul class="list-group">
                    @foreach ($siswa as $s)
                        <li class="list-group-item">{{ $s->name }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection --}}


@extends('layouts.guru')

@section('title', 'Detail Kelas' . $kelas->nama_kelas)

@section('content')
    <div class="container mt-4">
        {{-- <h1 class="mb-4">Detail Kelas: {{ $kelas->nama_kelas }}</h1> --}}

        <div class="row">
            <!-- Form Tambah Pertemuan -->
            <div class="col-md-12">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-success">
                        <h5 class="mb-0">Tambah Pertemuan Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('guru.kelas.addPertemuan', $kelas->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="input-group input-group-outline mb-3">
                                {{-- <label for="judul" class="form-label">Judul Pertemuan</label> --}}
                                <input type="text" class="form-control" id="judul" name="judul"
                                    placeholder="Judul Pertemuan" required>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                {{-- <label for="deskripsi" class="form-label">Deskripsi</label> --}}
                                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
                            </div>
                            <div class="input-group input-group-outline mb-3">
                                {{-- <label for="file" class="form-label">File (Optional)</label> --}}
                                <input type="file" class="form-control" id="file" name="file">
                            </div>
                            <button type="submit" class="btn btn-success">Tambah Pertemuan</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Daftar Pertemuan -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Daftar Pertemuan</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($pertemuans as $pertemuan)
                                <li class="list-group-item">
                                    <h5>{{ $pertemuan->judul }}</h5>
                                    <p>{{ $pertemuan->deskripsi }}</p>
                                    {{-- @if ($pertemuan->file)
                                    <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>
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
                                    <div class="mt-2">
                                        <a href="{{ route('guru.penilaian', [$kelas->id, $pertemuan->id]) }}"
                                            class="btn btn-sm btn-warning">Penilaian</a>
                                        <a href="{{ route('guru.kelas.editPertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}"
                                            class="btn btn-sm btn-info">
                                            Edit
                                        </a>
                                        <form
                                            action="{{ route('guru.kelas.deletePertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}"
                                            method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Apakah Anda yakin ingin menghapus pertemuan ini?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Daftar Siswa -->
            <div class="col-md-6">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">Daftar Siswa</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach ($siswa as $s)
                                <li class="list-group-item">{{ $s->name }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
