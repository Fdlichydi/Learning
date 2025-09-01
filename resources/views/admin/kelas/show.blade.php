{{-- @extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Detail Kelas: {{ $kelas->nama_kelas }}</h1>

    <div class="mb-3">
        <h4>Guru Pengampu</h4>
        <p>{{ $kelas->guru->name }}</p>
    </div>

    <div class="mb-3">
        <h4>Deskripsi</h4>
        <p>{{ $kelas->deskripsi }}</p>
    </div>

    <div class="mb-3">
        <h4>Daftar Siswa</h4>
        <ul>
            @foreach($kelas->siswa as $siswa)
            <li>{{ $siswa->name }}</li>
            @endforeach
        </ul>
    </div>

    <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Kembali</a>
</div>
@endsection --}}

@extends('layouts.admin')
@section('title', $kelas->nama_kelas)

@section('content')
<div class="container mt-5">
            
            <!-- Guru Pengampu Section -->
            <div class="outline  mb-4">
                <h5 class="font-weight-bold">Guru Pengampu</h5>
                <p class="outline text-muted">{{ $kelas->guru->name }}</p>
            </div>

            <!-- Deskripsi Section -->
            <div class="mb-4">
                <h5 class="font-weight-bold">Deskripsi</h5>
                <p class="text-muted">{{ $kelas->deskripsi }}</p>
            </div>

            <!-- Daftar Siswa Section -->
            <div class="mb-4">
                <h5 class="font-weight-bold">Daftar Siswa</h5>
                @if($kelas->siswa->count() > 0)
                    <ul class="list-group">
                        @foreach($kelas->siswa as $siswa)
                        <li class="list-group-item">{{ $siswa->name }}</li>
                        @endforeach
                    </ul>
                @else
                    <p class="text-muted">Belum ada siswa yang terdaftar di kelas ini.</p>
                @endif
            </div>

            <!-- Back Button -->
            <a href="{{ route('kelas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
</div>
@endsection
