<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Auth\RegisterController;

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
// Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
// });

Route::get('/index', function () {
    return view('index');
});

Route::get('/login', function () {
    return view('auth/login');
})->name('login');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/confirmation', function () {
    return view('auth/confirmation');
})->name('confirmation');

Route::get('/recovery_password', function () {
    return view('auth/recovery_password');
})->name('recovery_password');

Route::middleware(['role:admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::post('toggle/reservations/{id}', [ReservationController::class,'toggle']);
    Route::get('all/reservations', [ReservationController::class,'all']);
    Route::resource('reservations', ReservationController::class);
});

Route::middleware(['role:user'])->group(function () {
    Route::resource('reservations', ReservationController::class);
});
// Route::get('/ulist', function () {
//     return view('reservation/ulist');
// })->name('reservation_list');

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/register', function () {
//     return view('register');
// })->name('register');

// Login Routes
// Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration Routes
// Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
