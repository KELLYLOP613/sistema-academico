@extends('layouts.app')

@section('title', 'Detalle de Solicitud')

@section('content')
<div class="max-w-4xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Detalle de Solicitud</h1>
            <p class="text-gray-500 text-sm mt-1">Solicitud #{{ $solicitud->id }}</p>
        </div>
        <a href="{{ route('solicitudes.index') }}"
            class="bg-gray-100 text-gray-700 py-2 px-4 rounded-lg hover:bg-gray-200 transition">
            Volver
        </a>
    </div>

    {{-- Estado --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <p class="text-sm text-gray-500 mb-1">Estado actual</p>
                <span class="px-4 py-2 rounded-full text-sm font-bold
                    {{ $solicitud->estado == 'pendiente' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $solicitud->estado == 'en_revision' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $solicitud->estado == 'aprobada' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $solicitud->estado == 'rechazada' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst(str_replace('_', ' ', $solicitud->estado)) }}
                </span>
            </div>
            <a href="{{ route('solicitudes.edit', $solicitud) }}"
                class="bg-green-700 text-white py-2 px-4 rounded-lg hover:bg-green-800 transition">
                Actualizar Estado
            </a>
        </div>
    </div>

    {{-- Datos del estudiante --}}
    <div class="bg-white rounded-xl shadow p-6 mb-6">
        <h2 class="text-lg font-bold text-green-800 mb-4 border-b border-green-100 pb-2">
            Datos del Estudiante
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-sm text-gray-500">Nombre completo</p>
                <p class="font-medium">{{ $solicitud->estudiante->nombre }} {{ $solicitud->estudiante->apellido }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Código Estudiantil</p>
                <p class="font-medium">{{ $solicitud->estudiante->codigo_estudiantil }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Programa Académico</p>
                <p class="font-medium">{{ $solicitud->estudiante->programa_academico }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500">Email</p>
                <p class="font-medium">{{ $solicitud->estudiante->email }}</p>
            </div>
        </div>
    </div>

    {{-- Detalle de la solicitud --}}
        <div class="bg-white rounded-xl shadow p-6 mb-6">
            <h2 class="text-lg font-bold text-green-800 mb-4 border-b border-green-100 pb-2">
                Detalle de la Solicitud
            </h2>
            <div class="space-y-4">
                <div>
                    <p class="text-sm text-gray-500">Tipo de Solicitud</p>
                    <p class="font-medium">{{ $solicitud->tipo_solicitud }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Fecha de registro</p>
                    <p class="font-medium">{{ $solicitud->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Descripción</p>
                    <p class="font-medium bg-gray-50 p-3 rounded-lg border">{{ $solicitud->descripcion }}</p>
                </div>
                @if($solicitud->observaciones)
                <div>
                    <p class="text-sm text-gray-500">Observaciones</p>
                    <p class="font-medium bg-yellow-50 p-3 rounded-lg border border-yellow-200">
                        {{ $solicitud->observaciones }}
                    </p>
                </div>
                @endif
            </div>
        </div>

</div>
@endsection