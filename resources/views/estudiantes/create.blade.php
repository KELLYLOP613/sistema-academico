@extends('layouts.app')

@section('title', 'Registrar Estudiante')

@section('content')
<div class="max-w-3xl mx-auto px-4">

    {{-- Encabezado --}}
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Registrar Estudiante</h1>
        <p class="text-gray-500 text-sm mt-1">Completa el formulario para registrar un nuevo estudiante</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">
        <form action="{{ route('estudiantes.store') }}" method="POST" class="space-y-5">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}"
                        class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Nombre del estudiante"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido') }}"
                        class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Apellido del estudiante"
                        required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Documento</label>
                    <input type="text" name="documento" value="{{ old('documento') }}"
                        class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Número de documento"
                        required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Código Estudiantil</label>
                    <input type="text" name="codigo_estudiantil" value="{{ old('codigo_estudiantil') }}"
                        class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                        placeholder="Código estudiantil"
                        required>
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <input type="email" name="email" value="{{ old('email') }}"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="correo@institucion.edu.co"
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Programa Académico</label>
                <input type="text" name="programa_academico" value="{{ old('programa_academico') }}"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Ej: Ingeniería de Sistemas, ADSO..."
                    required>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">
                    Teléfono <span class="text-gray-400">(opcional)</span>
                </label>
                <input type="text" name="telefono" value="{{ old('telefono') }}"
                    class="block w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-500"
                    placeholder="Número de teléfono">
            </div>

            <div class="flex gap-3 pt-2">
                <button type="submit"
                    class="bg-green-700 text-white py-2 px-6 rounded-lg hover:bg-green-800 transition font-medium">
                    Registrar Estudiante
                </button>
                <a href="{{ route('estudiantes.index') }}"
                    class="bg-gray-100 text-gray-700 py-2 px-6 rounded-lg hover:bg-gray-200 transition font-medium">
                    Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection