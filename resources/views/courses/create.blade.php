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




                    <h1>Crear Nuevo Curso</h1>

                    <form method="POST" action="{{ route('courses.store') }}">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nombre del Curso:</label>
                            <input type="text" name="name" class="form-control">
                        </div>

                        {{-- <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control"></textarea>
                        </div> --}}

                        <button type="submit" class="btn btn-primary">Guardar Curso</button>
                    </form>

                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Volver al Listado de Cursos</a>




                </div>
            </div>
        </div>
    </div>


</x-app-layout>
