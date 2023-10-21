<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Cursos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- {{ __("You're logged in!") }} --}}

                    <h1>Editar Curso</h1>

                    <form method="POST" action="{{ route('courses.update', $course) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre del Curso:</label>
                            <input type="text" name="nombre" value="{{ $course->nombre }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Descripción:</label>
                            <textarea name="descripcion" class="form-control">{{ $course->descripcion }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </form>

                    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Volver al Listado de Cursos</a>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
