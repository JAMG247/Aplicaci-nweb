<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;

// Ruta raíz: redirige a listado de pacientes
Route::get('/', function () {
    return redirect()->route('pacientes.index');
});

// CRUD de pacientes
Route::get('/pacientes', [PacienteController::class, 'index'])->name('pacientes.index');
Route::get('/pacientes/create', [PacienteController::class, 'create'])->name('pacientes.create');
Route::post('/pacientes', [PacienteController::class, 'store'])->name('pacientes.store');
Route::get('/pacientes/{paciente}', [PacienteController::class, 'show'])->name('pacientes.show');
Route::get('/pacientes/{paciente}/edit', [PacienteController::class, 'edit'])->name('pacientes.edit');
Route::put('/pacientes/{paciente}', [PacienteController::class, 'update'])->name('pacientes.update');
Route::delete('/pacientes/{paciente}', [PacienteController::class, 'destroy'])->name('pacientes.destroy');

// Rutas adicionales para pacientes

Route::get('/tailwind-test', function () {
    return view('welcome');
});
