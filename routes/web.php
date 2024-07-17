<?php

//Controllers
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\CitasController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login');

//POST
Route::get('logout',[LoginController::class,'logout'])->name('logout');
Route::post('/validar-registro',[LoginController::class, 'register'])->name('validar-registro');
Route::post('/verificar-login', [LoginController::class, 'doLogin'])->name('verificar-login');
Route::post('/registrar-pacientes', [PacienteController::class, 'registerPatient'])->name('registrar-pacientes');
Route::post('/registrar-cita',[CitasController::class, 'registrarCita'])->name('registrar-cita');

//Vistas de navegacion
Route::get('/secretario', function () {
    return view('secretario');
})->name('secretario');

Route::get('/doctor', function () {
    return view('doctor');
})->name('doctor');

Route::get('/detallesCita', function () {
    return view('detallesCita');
});

Route::get('/detallesPacientes', function () {
    return view('detallesPacientes');
});

Route::get('/registroPacientes', function () {
    return view('registroPacientes');
});

Route::get('/registrarpersonal', function () {
    return view('registrarpersonal');
});
Route::get('/Consultar', function () {
    return view('Consultar');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//require __DIR__.'/auth.php';

