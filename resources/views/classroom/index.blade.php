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

                    <h1>Listado de Aulas</h1>

                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                {{-- <th>ID</th> --}}
                                <th scope="col" class="px-6 py-3">Detalle</th>
                                <th scope="col" class="px-6 py-3">Profesor Asignado</th>
                                <th scope="col" class="px-6 py-3">Curso Asociado</th>
                                <th scope="col" class="px-6 py-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    {{-- <td>{{ $classroom->id }}</td> --}}
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $classroom->detalle }}</td>
                                    <td scope="row"
                                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $classroom->teacher->name }}</td>
                                    <td>{{ $classroom->course->name }}</td>
                                    <td>
                                        <a href="{{ route('classroom.show', $classroom) }}"
                                            class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Detalles</a>
                                        {{-- <a href="{{ route('classroom.edit', $classroom) }}"
                                            class="btn btn-primary">Editar</a> --}}
                                        {{-- <a href="{{ route('classroom.assignGrades', $classroom) }}"
                                            class="btn btn-primary">Asignar
                                            Calificaciones
                                        </a> --}}
                                        {{-- <a href="{{ route('classrooms.assignStudents', $classroom) }}"
                                            class="btn btn-primary">Asignar Estudiantes</a> --}}

                                        <form method="POST" action="{{ route('classroom.destroy', $classroom) }}"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                class="text-red-700 hover:text-white border border-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-red-500 dark:text-red-500 dark:hover:text-white dark:hover:bg-red-600 dark:focus:ring-red-900"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este aula?')">Eliminar
                                                Aula</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <a href="{{ route('classroom.create') }}" class="btn btn-success">Crear Nueva Aula</a>


                </div>

            </div>
        </div>
    </div>
    </div>
</x-app-layout>
