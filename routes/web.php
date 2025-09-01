<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\PenilaianPertemuanController;
use App\Http\Controllers\PertemuanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    // Route::get('/admin/dashboard', function () {
    //     return view('dashboard.admin');
    // })->name('admin.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');

    Route::resource('users', UserController::class);
    Route::resource('kelas', KelasController::class);
    Route::get('kelas/{kelas}/siswa', [KelasController::class, 'addSiswa'])->name('kelas.addSiswa');
    Route::post('kelas/{kelas}/siswa', [KelasController::class, 'storeSiswa'])->name('kelas.storeSiswa');
    Route::delete('kelas/{kelas}/siswa/{siswa}', [KelasController::class, 'removeSiswa'])->name('kelas.removeSiswa');
    Route::resource('pertemuans', PertemuanController::class);
    Route::resource('tugas', TugasController::class);
});

Route::middleware(['role:guru'])->group(function () {
    // Route::get('/guru/dashboard', function () {
    //     return view('dashboard.guru');
    // })->name('guru.dashboard');

    Route::get('/guru/dashboard', [GuruController::class, 'index'])->name('guru.index');
    Route::get('/guru/kelas/{id}', [GuruController::class, 'detailKelas'])->name('guru.kelas.detail');

    Route::get('/kelas/{kelasId}/pertemuan/{pertemuanId}/penilaian', [PenilaianPertemuanController::class, 'penilaianForm'])->name('penilaian.pertemuan');
    Route::post('/kelas/{kelasId}/pertemuan/{pertemuanId}/penilaian', [PenilaianPertemuanController::class, 'simpanPenilaian'])->name('penilaian.simpan');
    Route::post('/penilaian/pertemuan/{pertemuan}', [PenilaianPertemuanController::class, 'storeOrUpdate'])->name('penilaian.storeOrUpdate');
    Route::get('/penilaian/pertemuan/{pertemuan}', [PenilaianPertemuanController::class, 'showPenilaian'])->name('penilaian.show');
    Route::post('/guru/kelas/{kelasId}/add-pertemuan', [GuruController::class, 'addPertemuan'])->name('guru.kelas.addPertemuan');
    Route::get('/guru/kelas/{kelasId}/pertemuan/{pertemuanId}/edit', [GuruController::class, 'editPertemuan'])->name('guru.kelas.editPertemuan');
    Route::post('/guru/kelas/{kelasId}/pertemuan/{pertemuanId}/update', [GuruController::class, 'updatePertemuan'])->name('guru.kelas.updatePertemuan');
    Route::delete('/guru/kelas/{kelasId}/pertemuan/{pertemuanId}/delete', [GuruController::class, 'deletePertemuan'])->name('guru.kelas.deletePertemuan');
    Route::get('/guru/kelas/{kelasId}/pertemuan/{pertemuanId}/penilaian', [GuruController::class, 'showPenilaian'])
        ->name('guru.penilaian');

});

Route::middleware(['role:siswa'])->group(function () {
    // Route::get('/siswa/dashboard', function () {
    //     return view('dashboard.siswa');
    // })->name('siswa.dashboard');

    // Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.index');
    // Route::get('/siswa/kelas/{id}', [SiswaController::class, 'detailKelas'])->name('siswa.kelas.detail');
    Route::get('/siswa/dashboard', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/dashboard/siswa/kelas/{kelasId}', [SiswaController::class, 'detailKelas'])->name('siswa.kelas.detail');
    Route::post('siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/upload-tugas', [SiswaController::class, 'uploadTugas'])->name('siswa.upload.tugas');
    // Route::get('siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/edit-tugas', [SiswaController::class, 'editTugas'])->name('siswa.editTugas');
    // Route::post('siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/update-tugas', [SiswaController::class, 'updateTugas'])->name('siswa.updateTugas');
    // Route untuk menampilkan form edit tugas
    Route::get('/siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/tugas/{tugasId}/edit', [SiswaController::class, 'editTugas'])
        ->name('siswa.edit.tugas');

    // Route untuk mengupdate tugas siswa
    Route::post('/siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/tugas/{tugasId}/update', [SiswaController::class, 'updateTugas'])
        ->name('siswa.update.tugas');

    Route::delete('siswa/kelas/{kelasId}/pertemuan/{pertemuanId}/delete-tugas', [SiswaController::class, 'deleteTugas'])->name('siswa.deleteTugas');
});

Route::post('/chatbot', [App\Http\Controllers\ChatbotController::class, 'respond'])->name('chatbot.respond');
