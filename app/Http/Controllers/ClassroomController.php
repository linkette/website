<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Classroom;



class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact('classroom'));
    }

    public function create()
    {
        // return view('classroom.create');
        $teachers = Teacher::all();
        $students = Student::all();// Obtener la lista de profesores
        return view('classroom.create', compact('teachers'));

        // $students = Student::all();
        // return view('classtoom.create', compact('students'));
        }
    

    public function store(Request $request)
    {
        // Validación de los datos del formulario
    
        $request->validate([
            'teacher_id' => 'required|exists:teachers,id',
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
        ]);
    
        // Crear una nueva clase
        $classroom = new Classroom([
            'nombre' => $request->nombre,
            // Otras columnas de la tabla 'classrooms'
        ]);
        $classroom->save();
    
        // Asignar al profesor a la clase
        $teacher = Teacher::find($request->teacher_id);
        $classroom->teachers()->attach($teacher);
    
        // Asignar estudiantes a la clase
        $students = Student::find($request->students);
        $classroom->students()->attach($students);
    
        return redirect()->route('classrooms.index')->with('success', 'Clase creada exitosamente');
    }

    public function show(Classroom $classroom)
    {
        return view('classroom.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        // return view('classroom.edit', compact('classroom'));
        $teachers = Teacher::all(); // Obtener la lista de profesores
        return view('classrooms.edit', compact('classroom', 'teachers'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        // Valida y actualiza los datos del aula en la base de datos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'capacidad' => 'required|integer',
        ]);
    
        $classroom->nombre = $request->nombre;
        $classroom->capacidad = $request->capacidad;
        $classroom->save();
    
        return redirect()->route('classroom.index')->with('success', 'Aula actualizada exitosamente');
    
    }

    public function destroy(Classroom $classroom)
    {
        // Elimina el aula de la base de datos
    }
}
