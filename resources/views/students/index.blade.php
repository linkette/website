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
                    <label for="student_id">Selecciona un estudiante:</label>
                    <select name="student_id" required>
                        @foreach ($students as $student)
                            <option value="{{ $student->id }}">{{ $student->name }}</option>
                        @endforeach
                    </select>

                </div>
            </div>
        </div>
    </div>


</x-app-layout>
