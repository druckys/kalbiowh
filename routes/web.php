<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\HistoryToolController;
use App\Http\Controllers\PengembalianController;

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

Route::group(['middleware' => ['auth']], function () {
    Route::resources([
        'tool' => ToolController::class,
        'peminjaman' => PeminjamanController::class,
        'pengembalian' => PengembalianController::class,
        'history' => HistoryToolController::class,

    ]);
    
    //harus pake ini agar alert/toast nya muncul
    Route::get('delete/{id}', [PeminjamanController::class, 'destroy'])->name('destroy');

    //untuk route export excel
    Route::get('history-export', [HistoryToolController::class, 'export'])->name('history.export');

});

require __DIR__.'/auth.php';
