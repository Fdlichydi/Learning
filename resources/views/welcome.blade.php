@extends('layouts.app')

@section('title', 'E-Learning SMKN 2 Padang')

@section('content')

    <div class="hero-section" style="background-image: url('{{ asset('images/background-image.jpg') }}'); background-size: cover; background-position: center; height: 400px;">
  
</div>

<div class="container mt-5">
    <section class="text-center mb-5">
        <h2>Tentang E-Learning SMKN 2 Padang</h2>
        <p class="lead text-muted">E-Learning SMKN 2 Padang adalah platform pembelajaran daring yang dirancang untuk memfasilitasi kegiatan belajar mengajar di SMKN 2 Padang. Dengan berbagai fitur modern, kami bertujuan memberikan pengalaman belajar terbaik bagi para siswa dan guru.</p>
    </section>

    <section class="row text-center">
        

        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <i class="fas fa-chalkboard-teacher fa-3x mb-3"></i>
                    <h4 class="card-title">Kelas Online</h4>
                    <p class="card-text">Ikuti kelas online dengan guru terbaik dari SMKN 2 Padang dan selesaikan tugas dengan mudah.</p>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-body">
                    <i class="fas fa-tasks fa-3x mb-3"></i>
                    <h4 class="card-title">Penilaian Online</h4>
                    <p class="card-text">Dapatkan hasil penilaian tugas secara online dengan transparansi dan kemudahan akses.</p>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
