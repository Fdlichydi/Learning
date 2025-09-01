{{-- @extends('layouts.guru')

@section('title', 'Edit Pertemuan')

@section('content')
    <div class="container">
        <h1>Edit Pertemuan: {{ $pertemuan->judul }}</h1>

        <form action="{{ route('guru.kelas.updatePertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group input-group-outline mb-3">
                <label for="judul" class="form-label">Judul Pertemuan</label>
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $pertemuan->judul }}" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                <label for="deskripsi" class="form-label">Deskripsi</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $pertemuan->deskripsi }}</textarea>
            </div>

            <div class="input-group input-group-outline mb-3">
                <label for="file" class="form-label">File</label>
                @if ($pertemuan->file)
                    <p>File saat ini: <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>{{ $pertemuan->file }}</a></p>
                @else
                    <small class="text-muted">Tidak ada file</small>
                @endif
                <input type="file" class="form-control" id="file" name="file">
            </div>

            <button type="submit" class="btn btn-success">Update Pertemuan</button>
        </form>
    </div>
@endsection --}}


@extends('layouts.guru')

@section('title', 'Edit Pertemuan :'.$pertemuan->judul)

@section('content')
<div class="container mt-4">
    
            <form action="{{ route('guru.kelas.updatePertemuan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="input-group input-group-outline mb-3">
                    {{-- <label for="judul" class="form-label">Judul Pertemuan</label> --}}
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $pertemuan->judul }}" placeholder="judul" required>
                </div>

                <div class="input-group input-group-outline mb-3">
                    {{-- <label for="deskripsi" class="form-label">Deskripsi</label> --}}
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ $pertemuan->deskripsi }}</textarea>
                </div>

                <div class="input-group input-group-outline mb-3">
                    {{-- <label for="file" class="form-label">File Pertemuan</label> --}}
                    {{-- @if ($pertemuan->file)
                        <p>File saat ini: <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>{{ $pertemuan->file }}</a></p>
                    @else
                        <small class="text-muted">Tidak ada file yang diunggah</small>
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
                    <input type="file" class="form-control mt-2" id="file" name="file">
                </div>

                <button type="submit" class="btn btn-success">Update Pertemuan</button>
                <a href="{{ route('guru.kelas.detail', $kelas->id) }}" class="btn btn-secondary">Kembali</a>
            </form>
        
</div>
@endsection
