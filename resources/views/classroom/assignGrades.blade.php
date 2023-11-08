<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <h1>Asignar Calificaciones a Estudiantes en Aula</h1>

                    <form method="POST" action="{{ route('classroom.assignGrades', ['classroom' => $classroom]) }}">
                        @csrf
                        <div class="form-group">
                            <label for="student_id[]">Seleccionar Estudiante:</label>
                            <select name="student_id[]" class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="score[]">Calificación:</label>
                            <input type="number" name="score[]" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-primary">Asignar Calificación</button>
                    </form>

                    <a href="{{ route('classrooms.show', $classroom) }}">Volver a los detalles del aula</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
