<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;

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
        $data = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        Grade::create($data);

        return redirect()->route('grades.index')->with('success', 'Calificación creada con éxito.');
    }

    public function show($id)
    {
        $grade = Grade::find($id);
        return view('grades.show', compact('grade'));
    }

    public function edit($id)
    {
        $grade = Grade::find($id);
        
        // Deberías cargar una lista de estudiantes y cursos disponibles
        $students = Student::all();
        $courses = Course::all();
        
        return view('grades.edit', compact('grade', 'students', 'courses'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'student_id' => 'required',
            'course_id' => 'required',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $grade = Grade::find($id);
        $grade->update($data);

        return redirect()->route('grades.index')->with('success', 'Calificación actualizada con éxito.');
    }

    public function destroy($id)
    {
        $grade = Grade::find($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('success', 'Calificación eliminada con éxito.');
    }
}
