<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\UserController;

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
//     return view('template');
// });

// Route::get('/login', function () {
//     return view('login');

// });

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::controller(UserController::class)->group(function(){
    Route::post('daftar', 'simpan_user')->name('daftar');
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('login_action', 'login_action')->name('masuk');
    Route::get('/logout', 'logout')->name('logout');

});

Route::controller(DosenController::class)->prefix('dosen')->group(function(){
    Route::get('','index')->name('dosen');
    Route::get('tambahdosen','tambahdosen')->name('dosen.tambah');
    Route::post('tambahdosen','simpanDosen')->name('dosen.simpandosen');
    Route::get('tampildatadosen/{id}','tampildatadosen')->name('dosen.tampil');
    Route::post('tampildatadosen/{id}','updatedosen')->name('dosen.update');
    Route::get('hapus/{id}','hapusdosen')->name('dosen.hapus');
}); 

Route::group(['middleware'=>['auth']], function(){
    Route::get('/', function(){
        return view('template');
    });
});