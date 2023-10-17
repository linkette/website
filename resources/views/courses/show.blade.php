@extends('layouts.app')

@section('content')
    <h1>Detalles del Curso</h1>
    <p><strong>Nombre del Curso:</strong> {{ $course->name }}</p>
    <a href="{{ route('courses.index') }}" class="btn btn-primary">Regresar</a>
@endsection
