<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Course;


class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::all();
        return view('grades.index', compact('grades'));
    }

    public function create()
    {
        // Aquí deberías cargar una lista de estudiantes y cursos disponibles
        $students = Student::all();
        $courses = Course::all();
        
        return view('grades.create', compact('students', 'courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'score' => 'required',
        ]);

        Grade::create($request->all());

        return redirect()->route('grades.index')->with('success', 'Calificación creada exitosamente');
    }

    public function show(Grade $grade)
    {
        return view('grades.show', compact('grade'));
    }

    public function edit(Grade $grade)
    {
        $students = Student::all();
        $courses = Course::all();
        return view('grades.edit', compact('grade', 'students', 'courses'));
    
        // $grade = Grade::find($id);
        
        // // Deberías cargar una lista de estudiantes y cursos disponibles
        // $students = Student::all();
        // $courses = Course::all();
        
        // return view('grades.edit', compact('grade', 'students', 'courses'));
    }
    public function update(Request $request, Grade $grade)
    // public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'score' => 'required',
        ]);

        $grade->update($request->all());

        return redirect()->route('grades.index')->with('success', 'Calificación actualizada exitosamente');
    
        // $data = $request->validate([
        //     'student_id' => 'required',
        //     'course_id' => 'required',
        //     'score' => 'required|numeric|min:0|max:100',
        // ]);

        // $grade = Grade::find($id);
        // $grade->update($data);

        // return redirect()->route('grades.index')->with('success', 'Calificación actualizada con éxito.');
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Calificación eliminada con éxito.');
    }
}
