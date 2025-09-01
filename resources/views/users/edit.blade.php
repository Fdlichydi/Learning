@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
<div class="card">
    
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="name" class="form-label">Nama</label> --}}
                <input type="text" name="name" class="form-control" value="{{ $user->name }}" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="email" class="form-label">Email</label> --}}
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>

            <div class="input-group input-group-outline mb-3">
                <label for="password" class="form-label">Password (Kosongkan jika tidak ingin mengubah)</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="role" class="form-label">Role</label> --}}
                <select name="role" class="form-select" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="guru" {{ $user->role == 'guru' ? 'selected' : '' }}>Guru</option>
                    <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('users.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
</div>
@endsection
