<?php

use App\Http\Controllers\BerkasController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HasilKaryaController;
use App\Http\Controllers\LihatBerkasController;
use App\Http\Controllers\LihatKaryaController;
use App\Http\Controllers\Management\ManageIndependentController;
use App\Http\Controllers\Management\ManageUserController;
use App\Http\Controllers\Management\ManageTeamController;
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

    Route::resource('team', TeamController::class)->only(['index', 'show'])->middleware('can:Team');
    Route::post('cari-team', [TeamController::class, 'cariTeam'])->name('team.find')->middleware('can:Team');
    Route::post('masuk-team', [TeamController::class, 'masukTeam'])->name('team.masuk')->middleware('can:Team');
    Route::post('buat-team', [TeamController::class, 'buatTeam'])->name('team.add')->middleware('can:Team');

    Route::post('upload-berkas', [BerkasController::class, 'uploadBerkas'])->name('berkas.upload');
    Route::post('delete-berkas', [BerkasController::class, 'deleteBerkas'])->name('berkas.delete');
    Route::get('download-berkas/{kode}/{berkas}', [LihatBerkasController::class, 'downloadBerkas'])->name('berkas.download');

    Route::post('upload-bukti-pembayaran', [BerkasController::class, 'uploadBuktiPembayaran'])->name('bukti.upload');
    Route::post('delete-bukti-pembayaran', [BerkasController::class, 'deleteBuktiPembayaran'])->name('bukti.delete');

    Route::resource('pengumpulan', PengumpulanController::class)->only('store');

    Route::resource('manage-user', ManageUserController::class)->only(['index', 'show'])->middleware('can:Manage');

    Route::resource('manage-team', ManageTeamController::class)->only(['index', 'update', 'destroy'])->middleware('can:Manage Team');
    Route::get('manage-team/{id?}', [ManageTeamController::class, 'show'])->name('manage-team.show')->middleware('can:Manage Team');

    Route::resource('manage-independent', ManageIndependentController::class)->only(['index', 'store', 'show', 'destroy'])->middleware('can:Manage Independent');;

    Route::get('hasil-software', [HasilKaryaController::class, 'software'])->name('hasil-software.index')->middleware('can:Hasil Software');
    Route::get('hasil-multimedia', [HasilKaryaController::class, 'multimedia'])->name('hasil-multimedia.index')->middleware('can:Hasil Multimedia');
    Route::get('hasil-network', [HasilKaryaController::class, 'network'])->name('hasil-network.index')->middleware('can:Hasil Network');
});

require __DIR__ . '/auth.php';
