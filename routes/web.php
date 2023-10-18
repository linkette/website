<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AsignaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\GradeController;
use App\Http\Controllers\ClassroomController;


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

    // rutas para estudiantes en clases 
        Route::resource('classroom-student', ClassroomStudentController::class);

    // rutas para maestres en clases 
        Route::resource('classroom-teacher', ClassroomTeacherController::class);
    //rutas para las clases
        Route::resource('classroom', ClassroomController::class);

});

require __DIR__.'/auth.php';
