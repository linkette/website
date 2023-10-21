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
                    <h1>Asignar Estudiantes a Aula</h1>

                    <form method="POST" action="{{ route('classrooms.assignStudents', $classroom) }}">
                        @csrf

                        <div class="form-group">
                            <label for="student_ids[]">Seleccionar Estudiantes:</label>
                            <select name="student_ids[]" multiple class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Asignar Estudiantes</button>
                    </form>

                    <a href="{{ route('classrooms.show', $classroom) }}">Volver a los detalles del aula</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
