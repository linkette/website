<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Asignacion') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-40">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">



                    @section('content')
                        <h1>Registrar Calificación</h1>
                        <form action="{{ route('grades.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="student_id">Estudiante:</label>
                                <select name="student_id" id="student_id" class="form-control" required>
                                    @foreach ($students as $student)
                                        <option value="{{ $student->id }}">{{ $student->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="course_id">Curso:</label>
                                <select name="course_id" id="course_id" class="form-control" required>
                                    @foreach ($courses as $course)
                                        <option value="{{ $course->id }}">{{ $course->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="score">Calificación:</label>
                                <input type="number" name="score" id="score" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    @endsection



                </div>
            </div>
        </div>
    </div>


</x-app-layout>
