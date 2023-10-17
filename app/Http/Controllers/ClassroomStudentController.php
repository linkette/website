<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Classroom;

class ClassroomStudentController extends Controller
{
    public function index()
{
    // Obtener la lista de asignaciones de estudiantes a aulas
    $assignments = ClassroomStudent::all();
    return view('classroom-student.index', compact('assignments'));
}

public function create()
{
    $students = Student::all();
    $classrooms = Classroom::all();
    return view('classroom-student.create', compact('students', 'classrooms'));
}

public function store(Request $request)
{
    $request->validate([
        'student_id' => 'required',
        'classroom_id' => 'required',
    ]);

    $assignment = new ClassroomStudent;
    $assignment->student_id = $request->student_id;
    $assignment->classroom_id = $request->classroom_id;
    $assignment->save();

    return redirect()->route('classroom-student.index')->with('success', 'Asignación creada con éxito');
}
}
