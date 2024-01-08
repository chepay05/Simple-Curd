<?php

use App\Http\Controllers\DepartemenController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\KaryawanDepartemenController;
use App\Models\karyawan_departemen;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[KaryawanController::class, 'index'])->name('index');
Route::get('/karyawan/create',[KaryawanController::class, 'create']) ;
Route::post('/karyawan/store',[KaryawanController::class, 'store']);
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('edit');
Route::post('/karyawan/update/{id}', [KaryawanController::class, 'update']);
Route::get('/karyawan/delete/{id}', [KaryawanController::class, 'delete'])->name('delete');

Route::get('/departemen',[DepartemenController::class,'index'])->name('departemen-index');
Route::get('/create',[DepartemenController::class,'create']);
Route::post('/store',[DepartemenController::class,'store']);
Route::get('/edit/{id}', [DepartemenController::class, 'edit'])->name('departemen-edit');
Route::post('/update/{id}', [DepartemenController::class, 'update']);
Route::get('/delete/{id}', [DepartemenController::class, 'delete'])->name('departemen-delete');

Route::get('/karyawan/departemen',[KaryawanDepartemenController::class,'index'])->name('karyawan_departemen.index');
Route::get('/karyawan/departemen/create',[KaryawanDepartemenController::class,'create']);
Route::post('/karyawan/departemen/store',[KaryawanDepartemenController::class,'store']);
Route::get('/karyawan/departemen/edit/{id}', [KaryawanDepartemenController::class, 'edit']);
Route::post('/karyawan/departemen/update/{id}', [KaryawanDepartemenController::class, 'update']);
Route::get('/karyawan/departemen/delete/{id}', [KaryawanDepartemenController::class, 'delete']);
