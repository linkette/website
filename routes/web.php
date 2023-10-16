<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;


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

    // Rutas para estudiantes
        Route::resource('students', StudentController::class);

    // Rutas para profesores
        Route::resource('teachers', TeacherController::class);

    // Rutas para cursos
        Route::resource('courses', CourseController::class);

    // Rutas para calificaciones
        Route::resource('grades', GradeController::class);

   

    Route::get('/students', function (){ return view('students.index'); })->name('students.index');
    
    Route::post('/students', function () {

        $materia = request('materia');

        // 
        asigna::create([
            'materia' => $materia,
            'usar_id' => auth()->id(),
        ]);
        
    
    });
   
});

require __DIR__.'/auth.php';
