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



                    @section('content')
                        <h1>Registrar Curso</h1>
                        <form action="{{ route('courses.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nombre del Curso:</label>
                                <input type="text" name="name" id="name" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </form>
                    @endsection



                </div>
            </div>
        </div>
    </div>


</x-app-layout>
