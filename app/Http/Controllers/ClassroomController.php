<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Grade;
use App\Models\Course;
use App\Models\Classroom;



class ClassroomController extends Controller
{
    public function index()
    {
        $classrooms = Classroom::all();
        return view('classroom.index', compact('classrooms'));
    }

    public function create()
    {
        $teachers = Teacher::all();
        $courses = Course::all();
        return view('classroom.create', compact('teachers', 'courses'));
    }

    public function update(Request $request, Classroom $classroom)
    {
        $request->validate([
            'detalle' => 'required|string|max:255',
            'teacher_id' => 'required|exists:teachers,id',
            'course_id' => 'required|exists:courses,id',
        ]);

        $classroom->update([
            'detalle' => $request->input('detalle'),
            'teacher_id' => $request->input('teacher_id'),
            'course_id' => $request->input('course_id'),
        ]);

        return redirect()->route('classrooms.show', $classroom)->with('success', 'Aula actualizada exitosamente.');
    }

    public function store(Request $request)
    {
        // Lógica para crear una nueva aula y asignar profesor y curso
        $classroom = new Classroom([
            'detalle' => $request->detalle,
        ]);
        $classroom->teacher()->associate($request->teacher_id);
        $classroom->course()->associate($request->course_id);
        $classroom->save();

        return redirect()->route('classroom.index')->with('success', 'Aula creada exitosamente');
    }

    public function show(Classroom $classroom)
    {
        $teacher = $classroom->teacher;
        $students = $classroom->students;
        // $grades = $classroom->grades;
        $course = $classroom->course;

        return view('classroom.show', compact('classroom', 'teacher', 'students', 'course'));
    }

    public function assignTeacher(Request $request, Classroom $classroom)
    {
        $teacher = Teacher::find($request->teacher_id);
        $classroom->teacher()->associate($teacher);
        $classroom->save();

        return redirect()->route('classroom.show', $classroom)->with('success', 'Profesor asignado exitosamente');
    } 

    public function assignStudents(Request $request, Classroom $classroom)
    {
        // Recupera la lista de estudiantes disponibles
        $students = Student::all();
    
        return view('classrooms.assign_students', compact('classroom', 'students'));
    }

    public function assignGrades(Request $request, Classroom $classroom)
    {
        // Lógica para asignar calificaciones a los estudiantes en el aula
         // Validar y procesar la información de las calificaciones
        $request->validate([
            'student_id.*' => 'required|exists:students,id',
            'score.*' => 'required|numeric|min:0|max:100',
        ]);

            $studentIds = $request->input('student_id');
            $scores = $request->input('score');

        foreach ($studentIds as $key => $studentId) {
        // Crear una nueva calificación para cada estudiante
            $grade = new Grade([
                'score' => $scores[$key],
            ]);

        // Asociar la calificación al estudiante y al aula
            $student = Student::find($studentId);
            $grade->student()->associate($student);
            $grade->classroom()->associate($classroom);

            $grade->save();
        }

         return redirect()->route('classroom.show', $classroom)->with('success', 'Calificaciones asignadas exitosamente');

    
    }
        public function edit($id)
    {
            // Recuperar el aula por su ID
            $classroom = Classroom::findOrFail($id);

            // Recuperar la lista de profesores y estudiantes para opciones de selección
            $teachers = Teacher::all();
            $students = Student::all();
            $courses = Course::all();

            // Cargar la vista de edición y pasar los datos necesarios
            return view('classroom.edit', compact('classroom', 'teachers', 'students', 'courses'));
    }

       
        public function destroy(Classroom $classroom)
    {
        // Eliminar el aula
        $classroom->delete();

        // Redirigir a la página de aulas o a donde desees después de la eliminación
        return redirect()->route('classroom.index')->with('success', 'Aula eliminada exitosamente.');
    }
    public function storeStudents(Request $request, Classroom $classroom)
    {
        // Validar los datos del formulario
        $request->validate([
            'students' => 'required|array',
            'students.*' => 'exists:students,id',
        ]);

        // Asignar estudiantes al aula
        $classroom->students()->sync($request->input('students'));

        return redirect()->route('classrooms.index')
            ->with('success', 'Estudiantes asignados exitosamente.');
    }
}

