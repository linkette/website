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

                    {{-- <form method="POST"">
                        @csrf
                        <div name="datos" class=" dark:bg-gray-600 overflow-hidden text-center py-4 px-5 font-bold">
                            <div class="  grid grid-cols-2 divide-2 divide-2">
                                <div name="carne">
                                    <p class=" text-right text-red-600">Carne: </p>
                                </div>
                                <div name="carne_num">
                                    <p class="text-left text-violet-500"> 2002002002</p>
                                </div>
                                <div nam="nombre">
                                    <p class="text-right text-red-600">Nombre: </p>
                                </div>
                                <div name="nombre_descr">
                                    <p class="text-left text-violet-500">Eddy Estuardo Yoc Valdés</p>
                                </div>
                                <div>
                                    <p class="text-right text-red-600">Carrera: </p>
                                </div>
                                <div>
                                    <p class="text-left text-violet-500">Ingenieria En sistemas</p>
                                </div>
                                <div>
                                    <textarea name="text" class=" bg-transparent ">escribir</textarea>
                                </div>
                            </div>


                            <br><br>
                            <button
                                class="bg-red-600
                                        hover:bg-red-800 text-white font-bold py-2 px-5 rounded-full">asignar
                                cursos
                            </button>

                        </div>

                    </form> --}}
                </div>
            </div>
        </div>
    </div>


</x-app-layout>
