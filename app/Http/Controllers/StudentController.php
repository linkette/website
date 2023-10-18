<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email',
        ]);

        Student::create($data);
        return redirect()->route('students.index')->with('success', 'Estudiante creado con éxito.');
    }

    public function show($id)
{
    $student = Student::find($id);
    return view('students.show', ['student' => $student]);
}

    public function edit($id)
    {
        $student = Student::find($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:students,email,' . $id,
        ]);

        $student = Student::find($id);
        $student->update($data);

        return redirect()->route('students.index')->with('success', 'Estudiante actualizado con éxito.');
    }

    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        return redirect()->route('students.index')->with('success', 'Estudiante eliminado con éxito.');
    }
}


