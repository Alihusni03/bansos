<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PantiController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\PengurusController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Relawan\DaftarPantiController;
use App\Http\Controllers\Donatur\DonaturDaftarPantiController;
use App\Http\Controllers\DashboardAnakController;
use App\Http\Controllers\DashboardKetuaController;
use App\Http\Controllers\DashboardPantiController;
use App\Http\Controllers\HalamandonaturController;
use App\Http\Controllers\DashboardKontakController;
use App\Http\Controllers\DashboardSosmedController;
use App\Http\Controllers\DashboardDonaturController;
use App\Http\Controllers\DashboardProfileController;
use App\Http\Controllers\DashboardRelawanController;
use App\Http\Controllers\DashboardRiwayatController;
use App\Http\Controllers\DashboardKegiatanController;
use App\Http\Controllers\DashboardKebutuhanController;
use App\Http\Controllers\DashboardTransaksiController;

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
//     return view('layouts.main');
// });

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [LoginController::class, 'logout']);

// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('/register', [RegisterController::class, 'register'])->name('register.submit');

// Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


Route::group(['middleware'=> 'auth'], function(){

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin');
    Route::resource('/dashboard/relawan', DashboardRelawanController::class);
    Route::resource('/dashboard/anak', DashboardAnakController::class);
    Route::resource('/dashboard/kegiatan', DashboardKegiatanController::class);
    Route::resource('/dashboard/kebutuhan', DashboardKebutuhanController::class);
    Route::resource('/dashboard/profile', DashboardProfileController::class);
    Route::resource('/dashboard/sosmed', DashboardSosmedController::class);
    Route::resource('/dashboard/ketua', DashboardKetuaController::class);
    Route::resource('/dashboard/donatur', DashboardDonaturController::class);
    Route::resource('/dashboard/transaksi', DashboardTransaksiController::class);
    Route::resource('/dashboard/pengurus', PengurusController::class);
    Route::resource('/dashboard/pantiasuhan', PantiController::class);
    // Route::post('/dashboard/pantiasuhan', [PantiController::class,'checkout'])->name('checkout');
    // Route::get('/dashboard/pantiasuhan', [PantiController::class, 'index'])->name('index');
    // Route::get('/dashboard/pantiasuhan', [PantiController::class, 'show'])->name('show');
    // Route::post('/dashboard/pantiasuhan', [PantiController::class, 'sandangpangan'])->name('sandangpangan');
    Route::get('/donasi', [DonasiController::class, 'index'])->name('donasi');
    Route::post('/checkout', [DonasiController::class, 'checkout'])->name('checkout');
    // Route::get('/dashboard/pantiasuhan', [DonasiController::class, 'index'])->name('index');
    // Route::get('/dashboard/pantiasuhan', [PantiController::class, 'index'])->name('panti1');
    Route::get('/relawan', [DaftarPantiController::class, 'index'])->name('relawan');
    Route::get('/donatur/daftar_panti', [DonaturDaftarPantiController::class, 'index'])->name('donatur');


    Route::resource('/dashboard/kontak', DashboardKontakController::class);
    Route::resource('/dashboard/riwayat', DashboardRiwayatController::class);

    Route::resource('/dashboard/developer', DeveloperController::class);

    Route::resource('/halamandonatur', HalamandonaturController::class);
});

Route::resource('/coba', DashboardPantiController::class);