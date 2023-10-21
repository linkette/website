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

                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Detalle</th>
                                <th>Profesor Asignado</th>
                                <th>Curso Asociado</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($classrooms as $classroom)
                                <tr>
                                    <td>{{ $classroom->id }}</td>
                                    <td>{{ $classroom->detalle }}</td>
                                    <td>{{ $classroom->teacher->name }}</td>
                                    <td>{{ $classroom->course->name }}</td>
                                    <td>
                                        <a href="{{ route('classroom.show', $classroom) }}"
                                            class="btn btn-info">Detalles</a>
                                        <a href="{{ route('classroom.edit', $classroom) }}"
                                            class="btn btn-primary">Editar</a>
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
