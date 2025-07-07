<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MateriController;

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

Route::get('/coba', function () {
    return view('akun.changePassword');
});
Route::get('/', [UserController::class, 'home'])->name('home');
Route::get('/masuk', [UserController::class, 'login']);
Route::get('/loginGuru', [UserController::class, 'loginGuru']);
Route::get('/loginMR', [UserController::class, 'loginMR']);
Route::get('/loginSiswa', [UserController::class, 'loginSiswa']);
Route::post('/loginMRS', [UserController::class, 'authenticate']);
Route::post('/loginG', [UserController::class, 'authenticateGuru']);
Route::get('/register', [UserController::class, 'register']);
Route::post('/register', [UserController::class, 'store'])->name('storeRegister');
Route::post('/logout', [UserController::class, 'logout']);
Route::get('/dashboard/{id}', [UserController::class, 'dashboard']);
Route::get('/dashboard/uploadMateri/{id}', [UserController::class, 'uploadMateri']);
Route::post('/storeMateri/{id}', [MateriController::class, 'store'])->name('storeMateri');
Route::get('/materis', [MateriController::class, 'index'])->name('materi');
// Route::get('/print-pdf/{id}', 'MateriController@printPdf')->name('print.pdf');
Route::get('/showPDF/{id}', [MateriController::class, 'showpdf'])->name('showPDF');
Route::get('/showVideo/{id}', [MateriController::class, 'showvideo'])->name('showVideo');
Route::get('/filter', [MateriController::class, 'filter'])->name('filter');
Route::get('/tabelMateri/{id}', [MateriController::class, 'tabelMateri'])->name('tabelMateri');
Route::delete('/tabelMateri/{id}', [MateriController::class, 'destroy'])->name('destroy');
Route::get('/editMateri/{id}', [MateriController::class, 'editMateri'])->name('editMateri');
Route::post('/updateMateri/{id}', [MateriController::class, 'updateMateri'])->name('updateMateri');
Route::get('/profile/{id}', [UserController::class, 'profile'])->name('profile');
Route::get('/editProfile/{id}', [UserController::class, 'editProfile'])->name('editProfile');
Route::post('/updateProfile/{id}', [UserController::class, 'updateProfile'])->name('updateProfile');
Route::get('/changePassword/{id}', [UserController::class, 'changePassword'])->name('changePassword');  //show change password
Route::post('/updatePassword/{id}', [UserController::class, 'updatePassword'])->name('updatePassword'); //update password







