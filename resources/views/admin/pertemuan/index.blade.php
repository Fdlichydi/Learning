<!-- resources/views/admin/pertemuan/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Daftar Pertemuan')

@section('content')
    <div class="container">
        {{-- <h1>Daftar Pertemuan</h1> --}}
        <a href="{{ route('pertemuans.create') }}" class="btn btn-primary">Tambah Pertemuan</a>
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th>Kelas</th>
                    <th>Judul</th>
                    <th>Deskripsi</th>
                    <th>File</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pertemuans as $pertemuan)
                    <tr>
                        <td>{{ $pertemuan->kelas->nama_kelas }}</td>
                        <td>{{ $pertemuan->judul }}</td>
                        <td>{{ $pertemuan->deskripsi }}</td>
                        <td>
                            {{-- @if ($pertemuan->file)
                                <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" download>{{ $pertemuan->file }}</a>
                            @endif --}}

                            @if ($pertemuan->file)
                                @php
                                    $extension = pathinfo($pertemuan->file, PATHINFO_EXTENSION);
                                @endphp

                                @if (in_array(strtolower($extension), ['mp4', 'webm', 'ogg']))
                                    <video width="320" height="240" controls>
                                        <source src="{{ url('pertemuan-files/' . $pertemuan->file) }}"
                                            type="video/{{ $extension }}">
                                        Browser Anda tidak mendukung pemutaran video.
                                    </video>
                                @else
                                    <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}"
                                        download>{{ $pertemuan->file }}</a>
                                @endif
                            @endif

                        </td>
                        <td>
                            <a href="{{ route('pertemuans.edit', $pertemuan->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('pertemuans.destroy', $pertemuan->id) }}" method="POST"
                                style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
