<!-- resources/views/admin/pertemuan/edit.blade.php -->
@extends('layouts.admin')

@section('title', 'Edit Pertemuan')

@section('content')
    <div class="container">
        {{-- <h1>Edit Pertemuan</h1> --}}
        <form action="{{ route('pertemuans.update', $pertemuan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="input-group input-group-outline mb-3">
                <input type="text" class="form-control" id="judul" name="judul" value="{{ $pertemuan->judul }}"
                    required>
            </div>
            <div class="input-group input-group-outline mb-3">
                <textarea class="form-control" id="deskripsi" name="deskripsi">{{ $pertemuan->deskripsi }}</textarea>
            </div>
            <div class="input-group input-group-outline mb-3">
                <input type="file" class="form-control" id="file" name="file">
                {{-- @if ($pertemuan->file)
                    <div class="mt-2">
                        <a href="{{ url('pertemuan-files/' . $pertemuan->file) }}" class="btn btn-sm btn-outline-secondary"
                            download>
                            Download File Lama
                        </a>
                    </div>
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
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
