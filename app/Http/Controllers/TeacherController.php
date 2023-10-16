<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index(){
        $teachers = Teacher::all();
        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teacher.create');
    }

    public function store(Request $request)
    {
        $data = $request->vaidate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email',
        ]);

        Teacher::create($data);
        return redirect()->route('teachers.index')->with('success', 'Profesor creado con éxito');
    }

    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.show', compact('teacher'));
    }

    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('teacher.show', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:teachers,email,' . $id,
        ]);

        $teacher = Teacher::find($id);
        $teacher->update($data);

        return redirect()->route('teachers.index')->with('success', 'Profesor Actualizado con éxito.');
    }

    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();

        return redirect()->route('teachers.index')->with('success', 'Profesor Eliminado con éxito.');
    }

}
