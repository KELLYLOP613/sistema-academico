<?php

namespace App\Http\Controllers;

use App\Models\Solicitud;
use App\Models\Estudiante;
use Illuminate\Http\Request;

class SolicitudController extends Controller
{
    // Listar todas las solicitudes
    public function index()
    {
        $solicitudes = Solicitud::with('estudiante')->latest()->paginate(10);
        return view('solicitudes.index', compact('solicitudes'));
    }

    // Mostrar formulario de nueva solicitud
    public function create()
    {
        $estudiantes = Estudiante::all();
        return view('solicitudes.create', compact('estudiantes'));
    }

    // Guardar nueva solicitud
    public function store(Request $request)
    {
        $request->validate([
            'estudiante_id' => 'required|exists:estudiantes,id',
            'tipo_solicitud' => 'required|string|max:100',
            'descripcion' => 'required|string|max:1000',
        ]);

        Solicitud::create([
            'estudiante_id' => $request->estudiante_id,
            'tipo_solicitud' => $request->tipo_solicitud,
            'descripcion' => $request->descripcion,
            'estado' => 'pendiente',
        ]);

        return redirect()->route('solicitudes.index')
            ->with('success', 'Solicitud registrada correctamente.');
    }

    // Mostrar detalle de una solicitud
    public function show(Solicitud $solicitud)
    {
        return view('solicitudes.show', compact('solicitud'));
    }

    // Mostrar formulario para actualizar estado
    public function edit(Solicitud $solicitud)
    {
        $solicitud->load('estudiante');
        return view('solicitudes.edit', compact('solicitud'));
    }

    // Actualizar estado de la solicitud
    public function update(Request $request, Solicitud $solicitud)
    {
        $request->validate([
            'estado' => 'required|in:pendiente,en_revision,aprobada,rechazada',
            'observaciones' => 'nullable|string|max:500',
        ]);

        $solicitud->update([
            'estado' => $request->estado,
            'observaciones' => $request->observaciones,
        ]);

        return redirect()->route('solicitudes.show', $solicitud)
            ->with('success', 'Estado actualizado correctamente.');
    }
}