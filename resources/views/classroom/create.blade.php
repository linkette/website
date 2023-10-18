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
                    <h1>Crear Nueva Clase</h1>

                    <form method="POST" action="{{ route('classroom.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="nombre">Nombre de la Clase:</label>
                            <input type="text" name="nombre" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="teacher_id">Profesor:</label>
                            <select name="teacher_id" class="form-control">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="student">Estudiantes:</label>
                            <select name="student[]" class="form-control" multiple>
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}">{{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Clase</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
