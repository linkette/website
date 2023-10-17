@extends('layouts.app')

@section('content')
    <h1>Detalles de la Calificación</h1>
    <p><strong>Estudiante:</strong> {{ $grade->student->name }}</p>
    <p><strong>Curso:</strong> {{ $grade->course->name }}</p>
    <p><strong>Calificación:</strong> {{ $grade->score }}</p>
    <a href="{{ route('grades.index') }}" class="btn btn-primary">Regresar</a>
@endsection
