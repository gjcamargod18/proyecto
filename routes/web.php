<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/usuarios/register',[UserController::class, 'createUser'])->name('create');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios');
Route::get('/usuarios/register', [UserController::class, 'vistaRegistrar'])->name('register');
Route::get('/usuarios/actualizar/{user}', [UserController::class, 'vistaEditar'])->name('actualizar');

Route::delete('/usuarios/borrar/{user}', [UserController::class, 'borrarUser'])->name('borrar');

Route::patch('/usuarios/editar',[UserController::class, 'actualizarUser'])->name('editar');
