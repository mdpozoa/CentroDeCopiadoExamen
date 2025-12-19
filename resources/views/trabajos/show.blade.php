@extends('layouts.app')

@section('titulo', 'Ver Detalle')

@section('contenido')
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Detalle del Trabajo #{{ $trabajo->id }}</h3>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-6">
                    <h5 class="text-muted">Cliente</h5>
                    <p class="fs-5 fw-bold">{{ $trabajo->cliente }}</p>
                </div>
                <div class="col-md-6">
                    <h5 class="text-muted">Teléfono</h5>
                    <p class="fs-5">{{ $trabajo->telefono }}</p>
                </div>
            </div>

            <div class="mb-4">
                <h5 class="text-muted">Descripción del Trabajo</h5>
                <div class="p-3 bg-light border rounded">
                    {{ $trabajo->descripcion }}
                </div>
            </div>

            <div class="row mb-4">
                <div class="col-md-4">
                    <h6 class="text-muted">Fecha de Recepción</h6>
                    <p>{{ $trabajo->created_at->format('d/m/Y H:i') }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Fecha de Entrega</h6>
                    <p>{{ \Carbon\Carbon::parse($trabajo->fecha_entrega)->format('d/m/Y') }}</p>
                </div>
                <div class="col-md-4">
                    <h6 class="text-muted">Estado</h6>
                    <span class="badge bg-{{ $trabajo->estado == 'Entregado' ? 'success' : ($trabajo->estado == 'Pendiente' ? 'danger' : 'warning') }} fs-6">
                        {{ $trabajo->estado }}
                    </span>
                </div>
            </div>

            <div class="d-flex gap-2">
                <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('trabajos.edit', $trabajo) }}" class="btn btn-warning">Modificar</a>
            </div>
        </div>
    </div>
@endsection