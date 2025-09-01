@extends('layouts.admin')
@section('title','Tambah Siswa ' .$kelas->nama_kelas)
@section('content')
<div class="container">
    
    

    <form action="{{ route('kelas.storeSiswa', $kelas->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="siswa_id" class="form-label fw-bold">Pilih Siswa</label>
            <select name="siswa_id[]" class="form-control select2 border border-primary rounded" multiple>
                @foreach($siswa as $s)
                    <option value="{{ $s->id }}"
                        @if($siswaTerdaftar->contains($s)) selected @endif>
                        {{ $s->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Tambah Siswa</button>
    </form>

    <!-- Daftar siswa yang sudah terdaftar di kelas -->
    <h2>Siswa Terdaftar</h2>
    <ul class="list-group">
        @foreach($siswaTerdaftar as $s)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $s->name }}
                <form action="{{ route('kelas.removeSiswa', [$kelas->id, $s->id]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>
@endsection

