<?php

use App\Http\Controllers\APIController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/akar-kuadrat', function () {
//     return view('akar_kuadrat');
// });
Route::get('/akar-kuadrat',[APIController::class,'tampil']);

//backend api 
Route::post('/hitung/akar/api',[APIController::class,'postApi'])->name('hitung-akar-api');

//backend plsql
Route::post('/hitung/akar/plsql',[APIController::class,'postPLSQL'])->name('hitung-akar-plsql');