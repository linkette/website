<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        Course::create($data);

        return redirect()->route('courses.index')->with('success', 'Curso creado con éxito.');
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }

    public function edit($id)
    {
        $course = Course::find($id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
        ]);

        $course = Course::find($id);
        $course->update($data);

        return redirect()->route('courses.index')->with('success', 'Curso actualizado con éxito.');
    }

    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Curso eliminado con éxito.');
    }
}
