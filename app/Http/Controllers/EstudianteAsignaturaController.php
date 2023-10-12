<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Asignatura;
use Illuminate\Http\Request;

class EstudianteAsignaturaController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        $asignaturas = Asignatura::all();
        return view('asignaturas.index', ['estudiantes' => $estudiantes, 'asignaturas' => $asignaturas]);
    }
}
