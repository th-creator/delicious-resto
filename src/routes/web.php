<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/uadd', function () {
    return view('app/uadd');
})->name('user_add');

Route::get('/user_list', function () {
    return view('app/ulist');
})->name('user_list');

Route::get('/uprivacy', function () {
    return view('app/uprivacy');
})->name('user_privacy');

Route::get('/uprofile', function () {
    return view('app/uprofile');
})->name('user_profile');
// Route::get('reservation_add', [ReservationController::class,'create']);
Route::resource('reservations', ReservationController::class);
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
