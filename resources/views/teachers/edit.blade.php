<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Editor de Maestros') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-40">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- aca esta el texto que aparece arriba del form  --}}
                    {{-- {{ __('realizar la asignación de sus cursos!') }} --}}

                    <h1
                        class="mb-4 text-4xl text-center font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl lg:text-4xl dark:text-white">
                        Editar Maestro</h1>
                    <br>

                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('teachers.update', $teacher->id) }} ">

                        @csrf
                        @method('PUT')

                        <div class="relative z-0 w-full mb-6 group">
                            <div class="form-group">
                                <label for="name"
                                    class="peer-focus:font-medium absolute text-5sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nombre</label>
                                <input type="text" name="name" id="name"
                                    class="form-control block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="{{ $teacher->name }}" color="black" value="{{ $teacher->name }}">
                            </div>
                        </div>
                        <div class="relative z-0 w-full mb-6 group">
                            <div class="form-group">
                                <label for="correo"
                                    class="peer-focus:font-medium absolute text-5sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Correo
                                    Electrónico</label>
                                <input type="email" name="email" id="email"
                                    class="form-control block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                                    placeholder="{{ $teacher->email }}" value="{{ $teacher->email }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="countries"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">catedra que
                                imparten
                            </label>


                            <select name="courses"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                multiple>
                                @foreach ($courses as $course)
                                    <option value="{{ $course->id }}"
                                        {{ in_array($course->id, $teacher->courses->pluck('id')->toArray()) ? 'selected' : '' }}>
                                        {{ $course->name }}
                                    </option>
                                @endforeach
                                {{-- @foreach ($courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->nombre }}</option>
                                @endforeach --}}
                            </select>
                        </div>


                        <button type="submit"
                            class="btn btn-primary text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar
                            Cambios</button>
                    </form>
                </div>


            </div>
        </div>
    </div>
    </div>


</x-app-layout>
