<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Teacher;
use App\Classroom;
use App\ClassroomTeacher;

class ClassroomTeacherController extends Controller
{
    public function index()
    {
        $assignments = ClassroomTeacher::all();
        return view('classroom-teacher.index', compact('assignments'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('classroom-teacher.create', compact('teachers', 'classrooms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'teacher_id' => 'required',
            'classroom_id' => 'required',
        ]);

        $assignment = new ClassroomTeacher;
        $assignment->teacher_id = $request->teacher_id;
        $assignment->classroom_id = $request->classroom_id;
        $assignment->save();

        return redirect()->route('classroom-teacher.index')->with('success', 'Asignación creada con éxito');
    }

    public function show($id)
    {
        $assignment = ClassroomTeacher::find($id);
        return view('classroom-teacher.show', compact('assignment'));
    }

    public function edit($id)
    {
        $assignment = ClassroomTeacher::find($id);
        $teachers = Teacher::all();
        $classrooms = Classroom::all();
        return view('classroom-teacher.edit', compact('assignment', 'teachers', 'classrooms'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'teacher_id' => 'required',
            'classroom_id' => 'required',
        ]);

        $assignment = ClassroomTeacher::find($id);
        $assignment->teacher_id = $request->teacher_id;
        $assignment->classroom_id = $request->classroom_id;
        $assignment->save();

        return redirect()->route('classroom-teacher.index')->with('success', 'Asignación actualizada con éxito');
    }

    public function destroy($id)
    {
        $assignment = ClassroomTeacher::find($id);
        $assignment->delete();

        return redirect()->route('classroom-teacher.index')->with('success', 'Asignación eliminada con éxito');
    }
}



