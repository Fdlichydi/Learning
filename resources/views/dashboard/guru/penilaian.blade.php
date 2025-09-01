{{-- @extends('layouts.guru')

@section('title', 'Penilaian Pertemuan')

@section('content')
<h1>Penilaian Pertemuan: {{ $pertemuan->judul }}</h1>

<form action="{{ route('penilaian.storeOrUpdate', $pertemuan->id) }}" method="POST">
    @csrf
    @method('POST')

    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Tugas</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>
                    @if (isset($tugas[$s->id]) && $tugas[$s->id])
                        <a href="{{ url('tugas-files/' . $tugas[$s->id]->file) }}" download>
                            {{ $tugas[$s->id]->file }}
                        </a>
                    @else
                        <small class="text-muted">Belum mengupload tugas</small>
                    @endif
                </td>
                <td>
                    <input type="number" name="nilai[{{ $s->id }}]" value="{{ old('nilai.' . $s->id, $nilaiSiswa->get($s->id, '')) }}" class="form-control" min="0" max="100" required>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</form>
@endsection --}}

{{-- @extends('layouts.guru')

@section('title', 'Penilaian Pertemuan')

@section('content')
<h1>Penilaian Pertemuan: {{ $pertemuan->judul }}</h1>

<form action="{{ route('penilaian.storeOrUpdate', $pertemuan->id) }}" method="POST">
    @csrf
    @method('POST')

    <table class="table">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>File Tugas</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>
                    @if(isset($tugas[$s->id]) && $tugas[$s->id]->file)
                        <a href="{{ url('tugas-files/' . $tugas[$s->id]->file) }}" download>
                            Download Tugas
                        </a>
                    @else
                        <small class="text-muted">Tugas belum diupload</small>
                    @endif
                </td>
                <td>
                    <input type="number" name="nilai[{{ $s->id }}]" value="{{ $tugas[$s->id]->nilai ?? '' }}" class="form-control" min="0" max="100" >
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</form>
@endsection --}}


@extends('layouts.guru')

@section('title', 'Penilaian Pertemuan: '. $pertemuan->judul)

@section('content')
<div class="container mt-4">
   
            <form action="{{ route('penilaian.storeOrUpdate', $pertemuan->id) }}" method="POST">
                @csrf
                @method('POST')

                <div class="table-responsive">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th>Nama Siswa</th>
                                <th>File Tugas</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($siswa as $s)
                            <tr>
                                <td>{{ $s->name }}</td>
                                <td>
                                    @if(isset($tugas[$s->id]) && $tugas[$s->id]->file)
                                        <a href="{{ url('tugas-files/' . $tugas[$s->id]->file) }}" download class="btn btn-sm btn-info">
                                            Download Tugas
                                        </a>
                                    @else
                                        <small class="text-muted">Tugas belum diupload</small>
                                    @endif
                                </td>
                                <td>
                                    <input type="number" name="nilai[{{ $s->id }}]" value="{{ $tugas[$s->id]->nilai ?? '' }}" class="form-control" min="0" max="100" placeholder="Masukkan Nilai">
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success">Simpan Penilaian</button>
                    <a href="{{ route('guru.kelas.detail', $kelas->id) }}" class="btn btn-secondary">Kembali</a>
                </div>
            </form>
</div>
@endsection
