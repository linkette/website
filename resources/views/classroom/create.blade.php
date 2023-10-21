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
                    <h1>Crear Nueva Aula</h1>

                    <form method="POST" action="{{ route('classroom.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="detalle">Detalle del Aula:</label>
                            <input type="text" name="detalle" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="teacher_id">Profesor Asignado:</label>
                            <select name="teacher_id" class="form-control">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id">Curso Asociado:</label>
                            <select name="course_id" class="form-control color-black">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Aula</button>
                    </form>

                    <a href="{{ route('classroom.index') }}">Volver a la lista de aulas</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
