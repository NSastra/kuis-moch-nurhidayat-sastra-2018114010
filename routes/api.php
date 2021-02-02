<?php

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\MatkulController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('', [LayoutController::class, 'index']);

Route::resources([
    'mahasiswa' => MahasiswaController::class,
    'absen' => AbsenController::class,
    'matkul' => MatkulController::class,
    'layout' => LayoutController::class
]);
