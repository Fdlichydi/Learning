{{-- @extends('layouts.siswa')

@section('title', 'Dahshboard')

@section('content')
<h1>Siswa Dashboard</h1>
Selamat datang  {{ $user->name }}

<h2>Kelas Anda:</h2>
<ul>
    @foreach($kelas as $k)
        <li>
            <a href="{{ route('siswa.kelas.detail', $k->id) }}">{{ $k->nama_kelas }}</a>
        </li>
    @endforeach
</ul>
@endsection --}}

{{-- @extends('layouts.siswa')

@section('title', 'Dashboard Siswa')

@section('content')
    <h1>Dashboard Siswa</h1>
    Selamat datang  {{ $user->name }}
    <h2>Kelas yang Anda Ikuti:</h2>
    <ul>
        @if($kelas)
            <li>
                <a href="{{ route('siswa.kelas.detail', $kelas->id) }}">{{ $kelas->nama_kelas }}</a>
            </li>
        @else
            <li>Anda belum terdaftar di kelas manapun.</li>
        @endif
    </ul>
@endsection --}}


@extends('layouts.siswa')

@section('title', 'Selamat Datang ' . $user->name)

@section('content')
<div class="container mt-4">
    
            <h5 class="card-title">Kelas Anda:</h5>

            <div class="row">
                @if($kelas->isEmpty())
                    <p class="text-muted">Anda belum terdaftar di kelas manapun.</p>
                @else
                    @foreach($kelas as $k)
                        <div class="col-md-4 mb-3">
                            <div class="card h-100">
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $k->nama_kelas }}</h5>
                                    <p class="card-text">Detail dan informasi kelas yang Anda ikuti.</p>
                                    <a href="{{ route('siswa.kelas.detail', $k->id) }}" class="btn btn-primary mt-auto">Lihat Detail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
</div>
@endsection
