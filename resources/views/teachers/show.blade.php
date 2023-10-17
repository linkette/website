@extends('layouts.app')

@section('content')
    <h1>Detalles del Profesor</h1>
    <p><strong>Nombre:</strong> {{ $teacher->name }}</p>
    <p><strong>Correo Electrónico:</strong> {{ $teacher->email }}</p>
    <a href="{{ route('teachers.index') }}" class="btn btn-primary">Regresar</a>
@endsection
