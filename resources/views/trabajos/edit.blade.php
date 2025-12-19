@extends('layouts.app')

@section('titulo', 'Editar Trabajo')

@section('contenido')
    <h1>Editar Trabajo</h1>
    <hr>

    <form action="{{ route('trabajos.update', $trabajo) }}" method="POST">
        @csrf
        @method('PUT') <div class="mb-3">
            <label class="form-label">Descripción</label>
            <input type="text" name="descripcion" class="form-control" value="{{ $trabajo->descripcion }}" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Cliente</label>
                <input type="text" name="cliente" class="form-control" value="{{ $trabajo->cliente }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono</label>
                <input type="text" name="telefono" class="form-control" value="{{ $trabajo->telefono }}" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Fecha de Entrega</label>
                <input type="date" name="fecha_entrega" class="form-control" value="{{ $trabajo->fecha_entrega }}" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Estado</label>
                <select name="estado" class="form-select" required>
                    <option value="Pendiente" {{ $trabajo->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                    <option value="En Proceso" {{ $trabajo->estado == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                    <option value="Listo" {{ $trabajo->estado == 'Listo' ? 'selected' : '' }}>Listo para retirar</option>
                    <option value="Entregado" {{ $trabajo->estado == 'Entregado' ? 'selected' : '' }}>Entregado</option>
                </select>
            </div>
        </div>

        <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-warning">Actualizar Orden</button>
    </form>
@endsection