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
                    {{-- aca esta el texto que aparece arriba del form  --}}
                    {{-- {{ __('realizar la asignación de sus cursos!') }} --}}

                    <h1>Lista de Estudiantes</h1>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Correo Electrónico</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <a href="{{ route('students.show', $student->id) }}"
                                            class="btn btn-primary">Ver</a>
                                        <a href="{{ route('students.edit', $student->id) }}"
                                            class="btn btn-warning">Editar</a>
                                        <form action="{{ route('students.destroy', $student->id) }}" method="post"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <a href="{{ route('students.create') }}" class="btn btn-success">Agregar Estudiante</a>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
