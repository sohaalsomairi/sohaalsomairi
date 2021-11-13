<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HrController;

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
Auth::routes();

Route::get('/', [HrController::class, 'test']);
Route::get('/myProfile', [HrController::class, 'myProfile']);
Route::get('/home', [HrController::class, 'test']);
Route::post('/home', [HrController::class, 'test']);
Route::get('/empsattendance', [HrController::class, 'attendance']);
Route::get('/empsattendancestatistics', [HrController::class, 'attendancestatistics']);
Route::post('/empsattendancestatistics/date', [HrController::class, 'attendancestatisticsperdate']);
Route::post('/attendance/emp', [HrController::class, 'empattendance']);
Route::post('/changePassword', [HrController::class, 'changePassword']);


