@extends('layouts.admin')
@section('title', 'Edit Kelas'.$kelas->nama_kelas)
@section('content')
<div class="container">
    {{-- <h1>Edit Kelas: {{ $kelas->nama_kelas }}</h1> --}}

    <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="input-group input-group-outline mb-3">
            {{-- <label for="nama_kelas" class="form-label">Nama Kelas</label> --}}
            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" value="{{ $kelas->nama_kelas }}" required>
        </div>

        <div class="input-group input-group-outline mb-3">
            {{-- <label for="guru_id" class="form-label">Pilih Guru</label> --}}
            <select name="guru_id" class="form-control" required>
                @foreach($guru as $g)
                <option value="{{ $g->id }}" {{ $g->id == $kelas->guru_id ? 'selected' : '' }}>
                    {{ $g->name }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="input-group input-group-outline mb-3">
            {{-- <label for="deskripsi" class="form-label">Deskripsi</label> --}}
            <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $kelas->deskripsi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('kelas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
