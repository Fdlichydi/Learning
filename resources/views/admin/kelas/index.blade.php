{{-- @extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Daftar Kelas</h1>
    <a href="{{ route('kelas.create') }}" class="btn btn-primary">Tambah Kelas</a>
    <table class="table mt-4">
        <thead>
            <tr>
                <th>Nama Kelas</th>
                <th>Guru</th>
                <th>Deskripsi</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kelas as $k)
            <tr>
                <td>{{ $k->nama_kelas }}</td>
                <td>{{ $k->guru->name }}</td>
                <td>{{ $k->deskripsi }}</td>
                <td>
                    <a href="{{ route('kelas.addSiswa', $k->id) }}" class="btn btn-secondary">Tambah Siswa</a>
                    <a href="{{ route('kelas.show', $k->id) }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-warning">Edit</a>
                    
                    <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}

@extends('layouts.admin')
@section('title', 'Manajemen Kelas')
@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        {{-- <h1 class="h3">Daftar Kelas</h1> --}}
        <a href="{{ route('kelas.create') }}" class="btn btn-primary">
            <i class="fas fa-plus mr-2"></i> Tambah Kelas
        </a>
    </div>

    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Nama Kelas</th>
                    <th>Guru</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kelas as $k)
                <tr>
                    <td>{{ $k->nama_kelas }}</td>
                    <td>{{ $k->guru->name }}</td>
                    <td>{{ $k->deskripsi }}</td>
                    <td class="text-center">
                        <a href="{{ route('kelas.addSiswa', $k->id) }}" class="btn btn-sm btn-secondary">
                            <i class="fas fa-user-plus"></i> Tambah Siswa
                        </a>
                        <a href="{{ route('kelas.show', $k->id) }}" class="btn btn-sm btn-info">
                            <i class="fas fa-eye"></i> Detail
                        </a>
                        <a href="{{ route('kelas.edit', $k->id) }}" class="btn btn-sm btn-warning">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        
                        <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus kelas ini?')">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
