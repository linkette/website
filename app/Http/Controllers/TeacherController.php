<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Course;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        // return view('teachers.create');
        $courses = Course::all(); // Obtiene la lista de cursos disponibles
        return view('teachers.create', compact('courses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
        ]);
    
        $teacher = Teacher::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        // Asigna los cursos al profesor
        $teacher->courses()->sync($request->courses);
    
        return redirect()->route('teachers.index')->with('success', 'Profesor creado exitosamente');
    
        // $data = $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|email|unique:teachers,email',
        // ]);

        // Teacher::create($data);
        // return redirect()->route('teachers.index')->with('success', 'Profesor creado con éxito');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('teachers.show', ['teacher' => $teacher]);
    }

    public function edit(Teacher $teacher)
    {
    $courses = Course::all(); // Obtiene la lista de cursos disponibles
    return view('teachers.edit', compact('teacher', 'courses'));
    }
    // public function edit($id)
    // {
        

    //     $teacher = Teacher::find($id);
    //     return view('teachers.edit', compact('teacher'));
    //     $course = Course::find($id);
    //     return view( 'teachers.edit', compact('course'));
    // }
    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:teachers,email',
            'course' => 'array', // Asegúrate de que 'courses' sea un arreglo
        ]);
    
        $teacher->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
    
        $teacher->courses()->sync($request->courses); // Sincroniza las cátedras
    
        return redirect()->route('teachers.index')->with('success', 'Profesor actualizado exitosamente');
    }
    
    // public function update(Request $request, $id)
    // {
        
    //     $data = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:teachers,email,' . $id,
    //     ]);

    //     $teacher = Teacher::find($id);
    //     $teacher->update($data);

    //     return redirect()->route('teachers.index')->with('success', 'Profesor Actualizado con éxito.');
    // }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Profesor Eliminado con éxito.');
    }

}
