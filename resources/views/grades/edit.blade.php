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
                    <h1>Editar Calificación</h1>

                    <form method="POST" action="{{ route('grades.update', $grade->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="student_id">Estudiante:</label>
                            <select name="student_id" class="form-control">
                                @foreach ($students as $student)
                                    <option value="{{ $student->id }}"
                                        {{ $student->id === $grade->student_id ? 'selected' : '' }}>
                                        {{ $student->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="course_id">Curso:</label>
                            <select name="course_id" class="form-control">
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ $course->id === $grade->course_id ? 'selected' : '' }}>{{ $course->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="score">Calificación:</label>
                            <input type="number" name="score" class="form-control" value="{{ $grade->score }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Actualizar Calificación</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
