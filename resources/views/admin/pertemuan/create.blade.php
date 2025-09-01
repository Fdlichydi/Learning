<!-- resources/views/admin/pertemuan/create.blade.php -->
@extends('layouts.admin')

@section('title', 'Tambah Pertemuan')

@section('content')
    <div class="container">
        {{-- <h1>Tambah Pertemuan</h1> --}}
        <form action="{{ route('pertemuans.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="kelas_id" class="form-label">Kelas</label> --}}
                <select name="kelas_id" class="form-control">
                    @foreach ($kelas as $kelas)
                        <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="judul">Judul</label> --}}
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required>
            </div>
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="deskripsi">Deskripsi</label> --}}
                <textarea class="form-control" id="deskripsi" name="deskripsi" placeholder="Deskripsi"></textarea>
            </div>
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="file">File (PDF/Word)</label> --}}
                <input type="file" class="form-control" id="file" name="file" placeholder="File (PDF/Word)">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
