{{-- @extends('layouts.guru')

@section('title', 'Penilaian Pertemuan')

@section('content')
<div class="container">
    <h1>Penilaian untuk Pertemuan: {{ $pertemuan->judul }}</h1>

    <form action="{{ route('penilaian.simpan', ['kelasId' => $kelas->id, 'pertemuanId' => $pertemuan->id]) }}" method="POST">
        @csrf

        <table class="table">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach($siswa as $s)
                <tr>
                    <td>{{ $s->name }}</td>
                    <td>
                        <input type="number" name="nilai[{{ $s->id }}]" class="form-control" min="0" max="100" value="{{ old('nilai.' . $s->id) }}">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <button type="submit" class="btn btn-success">Simpan Penilaian</button>
    </form>
</div>
@endsection --}}


@extends('layouts.guru')

@section('title', 'Penilaian Pertemuan')

@section('content')
<h1>Penilaian Pertemuan: {{ $pertemuan->judul }}</h1>

<form action="{{ route('penilaian.storeOrUpdate', $pertemuan->id) }}" method="POST">
    @csrf
    @method('POST')

    <table class="table align-items-center mb-0">
        <thead>
            <tr>
                <th>Nama Siswa</th>
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>
                    <input type="number" name="nilai[{{ $s->id }}]" value="{{ $nilaiSiswa->get($s->id, '') }}"  class="form-control" min="0" max="100" required>
                    {{-- value="{{ $s->nilai ?? '' }}" --}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</form>
@endsection


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
                <th>Nilai</th>
            </tr>
        </thead>
        <tbody>
            @foreach($siswa as $s)
            <tr>
                <td>{{ $s->name }}</td>
                <td>
                    <!-- Cek apakah nilai untuk siswa ini sudah ada, jika ada tampilkan -->
                    <input type="number" name="nilai[{{ $s->id }}]" value="{{ $nilaiSiswa[$s->id] ?? '' }}" class="form-control" min="0" max="100" required>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <button type="submit" class="btn btn-primary">Simpan Penilaian</button>
</form>
@endsection --}}
