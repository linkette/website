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

                    <h1>Editar Estudiante</h1>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('students.update', $student->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" color="black"
                                value="{{ $student->nombre }}">
                        </div>

                        <div class="form-group">
                            <label for="correo">Correo Electrónico</label>
                            <input type="email" name="correo" id="correo" class="form-control"
                                value="{{ $student->correo }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>

                        <a href="{{ route('students.index') }}" class="btn btn-success">regresar al inicio</a>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>


</x-app-layout>
