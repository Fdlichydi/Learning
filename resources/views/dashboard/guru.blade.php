{{-- @extends('layouts.guru')

@section('title', 'Dahshboard')

@section('content')
<h1>Dashboard Guru</h1>

<h2>Kelas yang Anda Ajar:</h2>
<ul>
    @foreach ($kelas as $k)
        <li>
            <a href="{{ route('guru.kelas.detail', $k->id) }}">{{ $k->nama_kelas }}</a>
        </li>
    @endforeach
</ul>

@endsection --}}

@extends('layouts.guru')

@section('title', 'Dashboard Guru')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h5 class="mb-4">Selamat Datang, {{ Auth::user()->name }}!</h5>


                <h5 class="mb-0">Kelas yang Anda Ajar :</h5>


                @if ($kelas->isEmpty())
                    <p class="text-muted">Anda belum mengajar kelas mana pun saat ini.</p>
                @else
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="text-center">
                                {{-- Table header with column names --}}
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                {{-- Loop through the classes and display them in the table --}}
                                @foreach ($kelas as $index => $k)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $k->nama_kelas }}</td>
                                        <td>
                                            <a href="{{ route('guru.kelas.detail', $k->id) }}" class="btn btn-sm btn-info">
                                                Lihat Detail
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif

            </div>
        </div>
    </div>
@endsection
