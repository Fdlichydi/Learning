@extends('layouts.admin')
@section('title', 'Tambah Kelas')
@section('content')
<div class="container">
    {{-- <h1>Tambah Kelas</h1> --}}
    <form action="{{ route('kelas.store') }}" method="POST">
        @csrf
        <div class="input-group input-group-outline mb-3">
            <label for="nama_kelas" class="form-label">Nama Kelas</label>
            <input type="text" name="nama_kelas" class="form-control" required>
        </div>
        <div class="input-group input-group-outline mb-3">
            {{-- <label for="guru_id" class="form-label">Guru</label> --}}
            <select name="guru_id" class="form-control">
                <option value="">Pilih Guru</option>
                @foreach($guru as $g)
                <option value="{{ $g->id }}">{{ $g->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-group input-group-outline mb-3">
            <label for="deskripsi" class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
