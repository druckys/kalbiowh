<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HistoryToolController;
use App\Http\Controllers\MaterialOutController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\HistoryMaterialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return redirect('/tool');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::group(['middleware' => ['auth', 'ceklevel:AAA,ATG']], function () {
    Route::resources([
        'tool' => ToolController::class,
        'peminjaman' => PeminjamanController::class,
        'pengembalian' => PengembalianController::class,
        'materialout' => MaterialOutController::class,
        'history-tools' => HistoryToolController::class,
        'history-materials' => HistoryMaterialController::class,

    ]);
    
    //harus pake ini agar alert/toast nya muncul
    Route::get('delete/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('destroy');
    Route::get('delete/material/{id}', [MaterialOutController::class, 'destroy'])->name('destroy');

    //untuk route export/import history-tools 
    Route::get('historytools-export', [HistoryToolController::class, 'export'])->name('historytools.export');
    Route::get('historytools-import', [HistoryToolController::class, 'import'])->name('historytools.import');
    Route::post('historytools-upload', [HistoryToolController::class, 'uploadHistory'])->name('historytools.upload');
    
    //untuk route export/import history-material
    Route::get('historymaterials-export', [HistoryMaterialController::class, 'export'])->name('historymaterials.export');
    Route::get('historymaterials-import', [HistoryMaterialController::class, 'import'])->name('historymaterials.import');
    Route::post('historymaterials-upload', [HistoryMaterialController::class, 'uploadHistory'])->name('historymaterials.upload');

});

require __DIR__.'/auth.php';
