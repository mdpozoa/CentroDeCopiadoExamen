@extends('layouts.app')

@section('titulo', 'Lista de Trabajos')

@section('contenido')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Órdenes de Trabajo</h1>
        <a href="{{ route('trabajos.create') }}" class="btn btn-primary">Nuevo Trabajo</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Cliente</th>
                    <th>Teléfono</th>
                    <th>Descripción</th>
                    <th>Entrega</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($trabajos as $trabajo)
                <tr>
                    <td>{{ $trabajo->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $trabajo->cliente }}</td>
                    <td>{{ $trabajo->telefono }}</td>
                    <td>{{ $trabajo->descripcion }}</td>
                    <td>{{ $trabajo->fecha_entrega }}</td>
                    <td>
                        <span class="badge bg-{{ $trabajo->estado == 'Entregado' ? 'success' : ($trabajo->estado == 'Pendiente' ? 'danger' : 'warning') }}">
                            {{ $trabajo->estado }}
                        </span>
                    </td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('trabajos.show', $trabajo) }}" class="btn btn-sm btn-info text-white">VER</a>
                            <a href="{{ route('trabajos.edit', $trabajo) }}" class="btn btn-sm btn-warning">MODIFICAR</a>
                            <form action="{{ route('trabajos.destroy', $trabajo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Confirma eliminar este registro?')">ELIMINAR</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection