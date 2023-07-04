<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\KategoriProdukController;
use App\Http\Controllers\PesananController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/salam', function(){
    return 'Assalamualaikum';
});
Route::get('/hallo', function(){
    return view ('/hallo');
});
Route::get('/hallo2', function(){
    return view('/hallo.halloworld');
});

// Buat route kabar dengan view kondisi
Route::get('/kabar', function () {
    return view('kondisi');
});

// Buat route nilai dengan view nilai
Route::get('/nilai', function () {
    return view('nilai');
});

// Buat route nilai dengan view pasien
Route::get('/pasien', function () {
    return view('pasien');
});

Route::get('/Form', [FormController::class, 'index']);
Route::post('/hasil', [FormController::class, 'store']);

//produk

Route::get('/kategori_produk', [KategoriProdukController::class, 'index'])->name('kategori_produk');
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
Route::get('/produk/view/{id}', [ProdukController::class, 'view'])->name('produk.view/{id}');
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit'])->name('produk/edit/{id}');
Route::get('/produk/delete/{id}', [ProdukController::class, 'delete'])->name('produk/delete/{id}');
//
//skill
Route::get('/skill', [SkillController::class, 'index']);
Route::post('/skillhasil', [SkillController::class, 'skillhasil']);
//
Route::get('/home', [FrontendController::class,'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');

Route::group(['middleware' => ['auth', 'role::admin-manager']], function(){
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/produk', [ProdukController::class, 'index'])->name('produk');
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::post('/produk/store', [ProdukController::class, 'store']);
Route::post('/produk/update', [ProdukController::class, 'update'])->name('produk/update');
    });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('after_register', function(){
    return view('after_register');
});
