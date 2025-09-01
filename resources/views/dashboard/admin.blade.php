@extends('layouts.admin')

@section('title', 'Dahshboard')

@section('content')
<div class="container">
Selamat datang  {{ $user->name }}
Disini anda bisa mengelola data kelas, siswa, dan guru serta pertemuan untuk materi kelas.
</div>




@endsection