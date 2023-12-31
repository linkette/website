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
                    <div>

                        <h1
                            class="mb-4 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                            Calificaciones</h1>

                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">

                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Estudiante</th>
                                    <th scope="col" class="px-6 py-3">Curso</th>
                                    <th scope="col" class="px-6 py-4">Calificación</th>
                                    <th scope="col" class="px-12 py-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grades as $grade)
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">

                                        <td class="px-6 py-4">{{ $grade->id }}</td>
                                        <td class="px-6 py-4">{{ $grade->student->name }}</td>
                                        <td class="px-6 py-4">{{ $grade->course->name }}</td>
                                        <td scope="row"
                                            class="px-12 py4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $grade->score }}</td>
                                        <td>
                                            <a
                                                href="{{ route('grades.show', $grade->id) }}"class="text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800">Ver</a>

                                            <a
                                                href="{{ route('grades.edit', $grade->id) }}"class="text-yellow-400 hover:text-white border border-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-yellow-300 dark:text-yellow-300 dark:hover:text-white dark:hover:bg-yellow-400 dark:focus:ring-yellow-900">Editar</a>

                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table> <br>
                        <a href="{{ route('grades.create') }}"
                            class="btn btn-success focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Agregar
                            crear nueva nota</a>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
