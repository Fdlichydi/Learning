@extends('layouts.admin')

@section('title', 'Tambah User')

@section('content')
<div class="card">
   
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="name" class="form-label">Nama</label> --}}
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="email" class="form-label">Email</label> --}}
                <input type="email" name="email" class="form-control" placeholder="Masukkan email" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="password" class="form-label">Password</label> --}}
                <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="role" class="form-label">Role</label> --}}
                <select name="role" class="form-select" required>
                    <option value="">Pilih Role</option>
                    <option value="admin">Admin</option>
                    <option value="guru">Guru</option>
                    <option value="siswa">Siswa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
