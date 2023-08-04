<?php

use App\Http\Controllers\Admin\{CursoController, RegistrationController, StudentController};
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //students
    Route::resource('/students', StudentController::class);

    //rota cursos, demonstrando outras formas.
    Route::get('/cursos/create', [CursoController::class, 'create'])->name('cursos.create');
    Route::delete('/cursos/{id}', [CursoController::class, 'destroy'])->name('cursos.destroy');
    Route::put('/cursos/{id}', [CursoController::class, 'update'])->name('cursos.update');
    Route::get('/cursos/{id}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
    Route::get('/cursos/{id}', [CursoController::class, 'show'])->name('cursos.show');
    Route::post('/cursos', [CursoController::class, 'store'])->name('cursos.store');
    Route::get('/cursos', [CursoController::class, 'index'])->name('cursos.index');

    //Registration
    Route::resource('/registration', RegistrationController::class);

    //perfil
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
