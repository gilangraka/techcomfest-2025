<?php

use App\Http\Controllers\BerkasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LihatBerkasController;
use App\Http\Controllers\LihatKaryaController;
use App\Http\Controllers\PengumpulanController;
use App\Http\Controllers\TeamController;

Route::get('/', [HomeController::class, 'index']);
Route::prefix('/competition')->controller(CompetitionController::class)->group(function () {
    Route::get('/web-app', 'webApp');
    Route::get('/ctf', 'ctf');
    Route::get('/ui-ux-design', 'uiux');
});

Route::middleware('auth')->group(function () {
    Route::resource('dashboard', DashboardController::class)->only(['index', 'store']);
    Route::post('update-profile', [DashboardController::class, 'update_profile'])->name('profile.update');
    Route::post('delete-profile', [DashboardController::class, 'delete_profile'])->name('profile.delete');

    Route::resource('team', TeamController::class);
    Route::post('cari-team', [TeamController::class, 'cariTeam'])->name('team.find');
    Route::post('masuk-team', [TeamController::class, 'masukTeam'])->name('team.masuk');
    Route::post('buat-team', [TeamController::class, 'buatTeam'])->name('team.add');

    Route::post('upload-berkas', [BerkasController::class, 'uploadBerkas'])->name('berkas.upload');
    Route::post('delete-berkas', [BerkasController::class, 'deleteBerkas'])->name('berkas.delete');
    Route::get('download-berkas/{kode}/{berkas}', [LihatBerkasController::class, 'downloadBerkas'])->name('berkas.download');

    Route::post('upload-bukti-pembayaran', [BerkasController::class, 'uploadBuktiPembayaran'])->name('bukti.upload');
    Route::post('delete-bukti-pembayaran', [BerkasController::class, 'deleteBuktiPembayaran'])->name('bukti.delete');

    Route::resource('pengumpulan', PengumpulanController::class)->only('store');
});

require __DIR__ . '/auth.php';
