<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PesananController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Middleware\Authenticate;

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


Route::middleware([Authenticate::class])->group(function () {

	Route::get('/Cashier', [CashierController::class, 'index']);
	Route::get('/Cashier', [CashierController::class, 'index']);
	Route::get('/Pesanan', [PesananController::class, 'index']);
	Route::post('/pesanan', [PesananController::class, 'store'])->name('pesanan.store');
	Route::get('/CreatePesanan', [PesananController::class, 'create']);
	Route::get('/editPesanan', [PesananController::class, 'edit']);
	Route::get('/pesanan/{id}/edit', [PesananController::class, 'edit'])->name('pesanan.edit');
	Route::put('/pesanan/{id}', [PesananController::class, 'update'])->name('pesanan.update');
	Route::get('/Pengeluaran', [PengeluaranController::class, 'index']);
	Route::get('/CreatePengeluaran', [PengeluaranController::class, 'create']);
	Route::post('/pengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');
	Route::get('/pengeluaran/{id}/edit', [PengeluaranController::class, 'edit'])->name('pengeluaran.edit');
	Route::put('/pengelauran/{id}', [PengeluaranController::class, 'update'])->name('pengeluaran.update');


	Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('/Cashier');
	})->name('dashboard');

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

	Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

	Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
	Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
	Route::get('/register', [RegisterController::class, 'create']);
	Route::post('/register', [RegisterController::class, 'store']);
	Route::get('/login', [SessionsController::class, 'create']);
	Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');
});

Route::get('/login', function () {
	return view('session/login-session');
})->name('login');
