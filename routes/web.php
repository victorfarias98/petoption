<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AuthController;
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

Route::get('login', [AuthController::class, 'formLogin'])->name('login');
Route::post('login-form', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('cadastro', [AuthController::class, 'registrationForm'])->name('register-user');
Route::post('cadastro', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');
    Route::resource('/pets', PetController::class);
    Route::get('logout', [AuthController::class, 'signOut'])->name('signout');
});
