<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsignaturaController;
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




Route::middleware('auth')->group(function () {
    
    // Route::resource('profile', 'ProfileController');


    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Route::get('/estudiantes', [EstudianteController::class, 'index'])->name('estudiantes.index');
    // Route::get('/asignaturas', [AsignaturaController::class, 'index'])->name('asignaturas.index');

   

    Route::get('/asignaturas', function (){ return view('asignaturas.index'); })->name('asignaturas.index');
    
    Route::post('/asignaturas', function () {

        $materia = request('materia');

        // 
        asigna::create([
            'materia' => $materia,
            'usar_id' => auth()->id(),
        ]);
        
    
    });
   
});

require __DIR__.'/auth.php';
