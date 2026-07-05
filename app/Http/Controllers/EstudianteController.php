<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    // Listar todos los estudiantes
    public function index()
    {
        $estudiantes = Estudiante::latest()->paginate(10);
        return view('estudiantes.index', compact('estudiantes'));
    }

    // Mostrar formulario de registro
    public function create()
    {
        return view('estudiantes.create');
    }

    // Guardar nuevo estudiante
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'documento' => 'required|string|unique:estudiantes',
            'email' => 'required|email|unique:estudiantes',
            'codigo_estudiantil' => 'required|string|unique:estudiantes',
            'programa_academico' => 'required|string|max:150',
            'telefono' => 'nullable|string|max:20',
        ]);

        Estudiante::create($request->all());

        return redirect()->route('estudiantes.index')
            ->with('success', 'Estudiante registrado correctamente.');
    }

    // Mostrar detalle de un estudiante
    public function show(Estudiante $estudiante)
    {
        return view('estudiantes.show', compact('estudiante'));
    }
}