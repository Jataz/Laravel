<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\RadiographerController;
use App\Http\Controllers\PatientController;

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
    return view('auth.login');
});


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {

});

Route::resource('doctor', DoctorController::class);
Route::resource('radiographer', RadiographerController::class);
Route::resource('users', UserController::class);
Route::resource('patients', PatientController::class);

Route::get('/set-appointment',[ PatientController::class,'setAppointment'])->name('request');
Route::get('/secretary-request',[PatientController::class,'secRequest'])->name('secretary.request');
Route::get('/radiographer-request',[PatientController::class,'radRequest'])->name('radiographer.requests');
Route::get('/doctor-examined',[PatientController::class,'docExamined'])->name('doctor.examined');

Route::get('/radiography-appointment',[PatientController::class,'radAppointment'])->name('radiography.appointment');
Route::get('/doctor-appointment',[PatientController::class,'docAppointment'])->name('doctor.appointment');


Route::get('/examined',[PatientController::class,'examined'])->name('examined');
//Users
Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
Route::post('/profile',[UserController::class,'postProfile'])->name('user.postProfile');