<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;

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

Route::get('', [LayoutController::class, 'index']);

Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'absen' => AbsenController::class,
    'matkul' => MatkulController::class,
]);
