{{-- <!-- resources/views/admin/pertemuan/index.blade.php -->
@extends('layouts.admin')

@section('title', 'Daftar Pertemuan')

@section('content')
    <div class="container">
        <h1>Daftar Pertemuan</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $tugas)
                    <tr>
                        
                        <td>{{ $tugas->siswa->name }}</td>
                        <td>{{ $tugas->kelas_id }}</td>
                        <td>{{ $tugas->pertemuan->judul }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}


{{-- @extends('layouts.admin')

@section('title', 'Daftar Pertemuan')

@section('content')
    <div class="container">
        <h1>Nilai Tugas</h1>

        <form method="GET" action="{{ route('tugas.index') }}">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" class="form-control">
                    <option value="">Pilih Nama Siswa</option>
                    @foreach ($siswaList as $siswa)
                        <option value="{{ $siswa->name }}" {{ request('nama_siswa') == $siswa->name ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>
        
            <button type="submit" class="btn btn-primary">Filter</button>
        </form>
        

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $tugas)
                    <tr>
                        <td>{{ $tugas->siswa->name }}</td> <!-- Mengambil nama siswa melalui relasi -->
                        <td>{{ $tugas->kelas->nama_kelas }}</td> <!-- Pastikan kelas diakses melalui relasi -->
                        <td>{{ $tugas->pertemuan->judul }}</td> <!-- Mengambil judul pertemuan -->
                        <td> @if ($tugas->nilai)
                            <p>Nilai : 
                                <a>
                                    {{ $tugas->nilai }}
                                </a>
                            </p>
                        @else
                            <p><em class="text-muted">Belum di nilai.</em></p>
                        @endif</td> 
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection --}}


{{-- @extends('layouts.admin')

@section('title', 'Daftar Pertemuan')

@section('content')
    <div class="container">
        <h1>Nilai Tugas</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('tugas.index') }}">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" class="form-control">
                    <option value="">Pilih Nama Siswa</option>
                    @foreach ($siswaList as $siswa)
                        <option value="{{ $siswa->name }}" {{ request('nama_siswa') == $siswa->name ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

         <!-- Tombol Cetak -->
         @if (!$tugas->isEmpty())
         <button onclick="printPage()" class="btn btn-success mt-3">Print Page</button>
     @endif

        <!-- Tabel Nilai Tugas -->
        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                <!-- Cek apakah ada data tugas -->
                @if ($tugas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <em class="text-muted">Tidak ada data. Siswa belum mengupload tugas.</em>
                        </td>
                    </tr>
                @else
                    @foreach ($tugas as $tugasItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                            <td>{{ $tugasItem->siswa->name }}</td> <!-- Mengambil nama siswa melalui relasi -->
                            <td>{{ $tugasItem->kelas->nama_kelas }}</td> <!-- Pastikan kelas diakses melalui relasi -->
                            <td>{{ $tugasItem->pertemuan->judul }}</td> <!-- Mengambil judul pertemuan -->
                            <td>
                                @if ($tugasItem->nilai)
                                    <p>Nilai : <a>{{ $tugasItem->nilai }}</a></p>
                                @else
                                    <p><em class="text-muted">Belum dinilai.</em></p>
                                @endif
                            </td> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

        <!-- Tambahkan Script Print -->
        <script>
            function printPage() {
                window.print();
            }
        </script>
@endsection --}}



{{-- @extends('layouts.admin')

@section('title', 'Nilai')

@section('content')
    <div class="container">
        <h1>Nilai Tugas</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('tugas.index') }}">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" class="form-control">
                    <option value="">Pilih Nama Siswa</option>
                    @foreach ($siswaList as $siswa)
                        <option value="{{ $siswa->name }}" {{ request('nama_siswa') == $siswa->name ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Tombol Cetak -->
        @if (!$tugas->isEmpty())
            <button onclick="printPage()" class="btn btn-success mt-3">Print Page</button>
        @endif

        <!-- Tabel Nilai Tugas -->
        <table class="table table-bordered mt-3" id="tugasTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @if ($tugas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <em class="text-muted">Tidak ada data. Siswa belum mengupload tugas.</em>
                        </td>
                    </tr>
                @else
                    @foreach ($tugas as $tugasItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                            <td>{{ $tugasItem->siswa->name }}</td> <!-- Mengambil nama siswa melalui relasi -->
                            <td>{{ $tugasItem->kelas->nama_kelas }}</td> <!-- Pastikan kelas diakses melalui relasi -->
                            <td>{{ $tugasItem->pertemuan->judul }}</td> <!-- Mengambil judul pertemuan -->
                            <td>
                                @if ($tugasItem->nilai)
                                    <p>Nilai : <a>{{ $tugasItem->nilai }}</a></p>
                                @else
                                    <p><em class="text-muted">Belum dinilai.</em></p>
                                @endif
                            </td> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Tambahkan Script Print dan CSS untuk Media Print -->
    <script>
        function printPage() {
            var header = `
                <!DOCTYPE html>
                <html lang="id">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Laporan Penilaian Kinerja Guru</title>
                    <style>
                        body {
                            font-family: 'Times New Roman', Times, serif;
                            line-height: 1.6;
                            text-align: center;
                        }

                        .container {
                            width: 100%;
                            margin: 0 auto;
                            padding: 10px;
                            border: 2px solid #000;
                        }

                        h1, h3 {
                            margin: 5px 0;
                        }

                        h1 {
                            font-size: 22px;
                            text-transform: uppercase;
                        }

                        h3 {
                            font-size: 16px;
                            margin-top: 10px;
                            text-decoration: underline;
                        }

                        .school-info {
                            margin-bottom: 10px;
                        }

                        .school-info h4 {
                            margin: 3px 0;
                            font-size: 12px;
                        }

                        hr {
                            border: 1px solid #000;
                            margin: 10px 0 15px 0;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 15px;
                            font-size: 9px;
                            table-layout: fixed;
                        }

                        th, td {
                            text-align: center;
                            padding: 2px;
                            border: 1px solid #000;
                            vertical-align: middle;
                            word-wrap: break-word;
                        }

                        th {
                            background-color: #f0f0f0;
                        }

                        .signature {
                            margin-top: 20px;
                            text-align: right;
                            margin-right: 20px;
                        }

                        .signature p {
                            margin: 5px 0;
                        }

                        @media print {
                            body {
                                font-size: 8px;
                            }

                            .container {
                                padding: 5px;
                                border: none;
                            }

                            table {
                                width: 100%;
                                font-size: 8px;
                            }

                            th, td {
                                padding: 1px;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="school-info">
                            <h1>SMK Negeri 2 Padang</h1> 
                            <h4>Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25121</h4>
                            <h4>Telp: 075471611, Email: smkn2padang@gmail.com</h4> 
                            <hr>
                            <h3>Laporan Nilai Tugas Siswa</h3> 
                        </div>
                        <div class="signature">
                            <p>Mengetahui,</p>
                            <p>Kepala Sekolah</p>
                            <br>
                            <p>Nama Kepala Sekolah</p>
                            <p>NIP Kepala Sekolah</p>
                        </div>
                    `;

            var printContents = document.getElementById('tugasTable').outerHTML; // Ambil hanya konten tabel
            var originalContents = document.body.innerHTML; // Simpan konten asli

            document.body.innerHTML = header + printContents + `</div></body></html>`; // Ganti konten dengan tabel dan header
            window.print(); // Cetak halaman
            document.body.innerHTML = originalContents; // Kembalikan konten asli setelah mencetak
        }
    </script>
@endsection --}}


{{-- @extends('layouts.admin')

@section('title', 'Nilai Tugas')

@section('content')
    <div class="container">
        <h1>Nilai Tugas</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('tugas.index') }}">
            <div class="form-group">
                <label for="nama_siswa">Nama Siswa</label>
                <select name="nama_siswa" class="form-control">
                    <option value="">Pilih Nama Siswa</option>
                    @foreach ($siswaList as $siswa)
                        <option value="{{ $siswa->name }}" {{ request('nama_siswa') == $siswa->name ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Tombol Cetak -->
        @if (!$tugas->isEmpty())
            <button onclick="printPage()" class="btn btn-success mt-3">Print Page</button>
        @endif

        <!-- Tabel Nilai Tugas -->
        <table class="table table-bordered mt-3" id="tugasTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @if ($tugas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <em class="text-muted">Tidak ada data. Siswa belum mengupload tugas.</em>
                        </td>
                    </tr>
                @else
                    @foreach ($tugas as $tugasItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                            <td>{{ $tugasItem->siswa->name }}</td> <!-- Mengambil nama siswa melalui relasi -->
                            <td>{{ $tugasItem->kelas->nama_kelas }}</td> <!-- Pastikan kelas diakses melalui relasi -->
                            <td>{{ $tugasItem->pertemuan->judul }}</td> <!-- Mengambil judul pertemuan -->
                            <td>
                                @if ($tugasItem->nilai)
                                    <p>Nilai : <a>{{ $tugasItem->nilai }}</a></p>
                                @else
                                    <p><em class="text-muted">Belum dinilai.</em></p>
                                @endif
                            </td> 
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>

    <!-- Tambahkan Script Print dan CSS untuk Media Print -->
    <script>
        function printPage() {
            var header = `
                <!DOCTYPE html>
                <html lang="id">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Laporan Penilaian Kinerja Guru</title>
                    <style>
                        body {
                            font-family: 'Times New Roman', Times, serif;
                            line-height: 1.6;
                            text-align: center;
                        }

                        .container {
                            width: 100%;
                            margin: 0 auto;
                            padding: 10px;
                            border: 2px solid #000;
                        }

                        h1, h3 {
                            margin: 5px 0;
                        }

                        h1 {
                            font-size: 22px;
                            text-transform: uppercase;
                        }

                        h3 {
                            font-size: 16px;
                            margin-top: 10px;
                            text-decoration: underline;
                        }

                        .school-info {
                            margin-bottom: 10px;
                        }

                        .school-info h4 {
                            margin: 3px 0;
                            font-size: 12px;
                        }

                        hr {
                            border: 1px solid #000;
                            margin: 10px 0 15px 0;
                        }

                       
                        th, td {
                            text-align: center;
                            padding: 2px;
                            border: 1px solid #000;
                            vertical-align: middle;
                            word-wrap: break-word;
                        }

                        th {
                            background-color: #f0f0f0;
                        }

                        .signature {
                            margin-top: 20px;
                            text-align: right;
                            margin-right: 20px;
                        }

                        .signature p {
                            margin: 5px 0;
                        }

                        @media print {
                            body {
                                font-size: 8px;
                            }

                            .container {
                                padding: 5px;
                                border: none;
                            }

                            table {
                                width: 100%;
                                font-size: 8px;
                            }

                            th, td {
                                padding: 1px;
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="school-info">
                            <h1>SMK Negeri 2 Padang</h1> 
                            <h4>Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25121</h4>
                            <h4>Telp: 075471611, Email: smkn2padang@gmail.com</h4> 
                            <hr>
                            <h3>Laporan Nilai Tugas Siswa</h3> 
                        </div>
                       
                    `;

            var printContents = document.getElementById('tugasTable').outerHTML; // Ambil hanya konten tabel
            var originalContents = document.body.innerHTML; // Simpan konten asli

            document.body.innerHTML = header + printContents + `</div></body></html>`; // Ganti konten dengan tabel dan header
            window.print(); // Cetak halaman
            document.body.innerHTML = originalContents; // Kembalikan konten asli setelah mencetak
        }
    </script>
@endsection --}}



@extends('layouts.admin')

@section('title', 'Nilai Tugas')

@section('content')
    <div class="container">
        <h1>Laporan Pertemuan dan Nilai Siswa</h1>

        <!-- Form Filter -->
        <form method="GET" action="{{ route('tugas.index') }}">
            <div class="input-group input-group-outline mb-3">
                {{-- <label for="nama_siswa">Nama Siswa</label> --}}
                <select name="nama_siswa" class="form-control">
                    <option value="">Pilih Nama Siswa</option>
                    @foreach ($siswaList as $siswa)
                        <option value="{{ $siswa->name }}" {{ request('nama_siswa') == $siswa->name ? 'selected' : '' }}>
                            {{ $siswa->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="input-group input-group-outline mb-3">
                {{-- <label for="kelas">Kelas</label> --}}
                <select name="kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ($kelasList as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Filter</button>
        </form>

        <!-- Tombol Cetak -->
        @if (!$tugas->isEmpty())
            <button onclick="printPage()" class="btn btn-success mt-3">Print Page</button>
        @endif

        <!-- Tabel Nilai Tugas -->
        <table class="table align-items-center mb-0" id="tugasTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Kelas</th>
                    <th>Pertemuan</th>
                    <th>Nilai</th>
                </tr>
            </thead>
            <tbody>
                @if ($tugas->isEmpty())
                    <tr>
                        <td colspan="5" class="text-center">
                            <em class="text-muted">Tidak ada data. Siswa belum mengupload tugas.</em>
                        </td>
                    </tr>
                @else
                    @foreach ($tugas as $tugasItem)
                        <tr>
                            <td>{{ $loop->iteration }}</td> <!-- Nomor urut -->
                            <td>{{ $tugasItem->siswa->name }}</td> <!-- Mengambil nama siswa melalui relasi -->
                            <td>{{ $tugasItem->kelas->nama_kelas }}</td> <!-- Pastikan kelas diakses melalui relasi -->
                            <td>{{ $tugasItem->pertemuan->judul }}</td> <!-- Mengambil judul pertemuan -->
                            <td>
                                @if ($tugasItem->nilai)
                                    <p>Nilai : <a>{{ $tugasItem->nilai }}</a></p>
                                @else
                                    <p><em class="text-muted">Belum dinilai.</em></p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>

    </div>

    <!-- Tambahkan Script Print dan CSS untuk Media Print -->
    <script>
        function printPage() {
            var header = `
                <!DOCTYPE html>
                <html lang="id">
                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Laporan Penilaian Kinerja Guru</title>
                    <style>
                        body {
                            font-family: 'Times New Roman', Times, serif;
                            line-height: 1.6;
                            text-align: center;
                        }

                        .container {
                            width: 100%;
                            margin: 0 auto;
                            padding: 10px;
                            border: 2px solid #000;
                        }

                        h1, h3 {
                            margin: 5px 0;
                        }

                        h1 {
                            font-size: 22px;
                            text-transform: uppercase;
                        }

                        h3 {
                            font-size: 16px;
                            margin-top: 10px;
                            text-decoration: underline;
                        }

                        .school-info {
                            margin-bottom: 10px;
                        }

                        .school-info h4 {
                            margin: 3px 0;
                            font-size: 12px;
                        }

                        hr {
                            border: 1px solid #000;
                            margin: 10px 0 15px 0;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-bottom: 15px;
                            font-size: 10px; /* Ukuran font lebih besar */
                            border: 2px solid #000; /* Border tabel */
                        }

                        th, td {
                            text-align: center;
                            padding: 5px; /* Padding yang lebih besar */
                            border: 1px solid #000;
                            vertical-align: middle;
                            word-wrap: break-word;
                        }

                        th {
                            background-color: #f0f0f0;
                            font-weight: bold; /* Tebal untuk header */
                        }

                        .signature {
                            margin-top: 20px;
                            text-align: right;
                            margin-right: 20px;
                        }

                        .signature p {
                            margin: 5px 0;
                        }

                        @media print {
                            body {
                                font-size: 8px;
                            }

                            .container {
                                padding: 5px;
                                border: none;
                            }

                            table {
                                width: 100%;
                                font-size: 8px; /* Ukuran font lebih kecil untuk muat di halaman */
                                border: 2px solid #000; /* Border tabel untuk cetak */
                            }

                            th, td {
                                padding: 1px; /* Padding lebih kecil saat cetak */
                            }
                        }
                    </style>
                </head>
                <body>
                    <div class="container">
                        <div class="school-info">
                            <h1>SMK Negeri 2 Padang</h1> 
                            <h4>Simpang Haru, Kec. Padang Tim., Kota Padang, Sumatera Barat 25121</h4>
                            <h4>Telp: 075471611, Email: smkn2padang@gmail.com</h4> 
                            <hr>
                            <h3>Laporan Nilai Tugas Siswa</h3> 
                        </div>
                    `;

            var printContents = document.getElementById('tugasTable').outerHTML; // Ambil hanya konten tabel
            var signature = `
                        <div class="signature">
                            <p>Mengetahui,</p>
                            <p>Kepala Sekolah</p>
                            <br>
                            <p>Nama Kepala Sekolah</p>
                            <p>NIP Kepala Sekolah</p>
                        </div>
                    `;

            var originalContents = document.body.innerHTML; // Simpan konten asli

            document.body.innerHTML = header + printContents + signature +
            `</div></body></html>`; // Ganti konten dengan tabel dan header
            window.print(); // Cetak halaman
            document.body.innerHTML = originalContents; // Kembalikan konten asli setelah mencetak
        }
    </script>
@endsection
