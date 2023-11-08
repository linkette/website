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

                    <h1>Editar Aula</h1>

                    <form method="PUT" action="{{ route('classroom.update', $classroom) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="detalle">Detalle del Aula:</label>
                            <input type="text" name="detalle" class="color-black" value="{{ $classroom->detalle }}"
                                class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="teacher_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Profesor
                                Asignado:</label>
                            <select name="teacher_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($teachers as $teacher)
                                    <option value="{{ $teacher->id }}"
                                        {{ $classroom->teacher_id == $teacher->id ? 'selected' : '' }}>
                                        {{ $teacher->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Curso
                                Asociado:</label>
                            <select name="course_id"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $classroom->course_id == $course->id ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>


                    {{-- <a href="{{ route('classroom.show', $classroom) }}">Volver a los detalles del aula</a> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
