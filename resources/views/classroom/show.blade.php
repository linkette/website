<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalles de las aulas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}
                    <div>
                        <h1>Detalles del Aula</h1>

                        <p>ID del Aula: {{ $classroom->id }}</p>
                        <p>Detalle del Aula: {{ $classroom->detalle }}</p>

                        <h2>Profesor Asignado</h2>
                        <p>Nombre del Profesor: {{ $teacher->name }}</p>
                        <!-- Otra información del profesor -->

                        <h2>Estudiantes en el Aula</h2>
                        <ul>
                            @foreach ($students as $student)
                                <li>{{ $student->name }}</li>
                            @endforeach
                        </ul>

                        <h2>Calificaciones en el Aula</h2>
                        {{-- <ul>
                            @foreach ($grades as $grade)
                                <li>Calificación: {{ $grade->score }}</li>
                            @endforeach
                        </ul> --}}

                        <h2>Curso Asociado al Aula</h2>
                        <p>Nombre del Curso: {{ $course->name }}</p>
                        <p>Descripción del Curso: {{ $course->descripcion }}</p>

                        <a href="{{ route('classroom.index') }}">Volver a la lista de aulas</a>

                    </div>
                    {{-- <div>
                        <h1>Detalles del Aula</h1>

                        <h2>Información del Aula</h2>
                        <p>ID del Aula: {{ $classroom->id }}</p>
                        <p>Otro detalle del aula: {{ $classroom->detalle }}</p>

                        <h2>Profesor Asignado</h2>
                        <p>Nombre del Profesor: {{ $teacher->nombre }}</p>
                        <p>Otra información del profesor: {{ $teacher->otro_campo }}</p>

                        <h2>Estudiantes en el Aula</h2>
                        <ul>
                            @foreach ($students as $student)
                                <li>{{ $student->nombre }}</li>
                            @endforeach
                        </ul>

                        <a href="{{ route('classrooms.index') }}">Volver a la lista de aulas</a>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
