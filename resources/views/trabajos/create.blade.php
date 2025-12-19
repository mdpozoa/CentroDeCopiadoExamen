@extends('layouts.app')

@section('titulo', 'Nuevo Trabajo')

@section('contenido')
    <h1>Registrar Nuevo Trabajo</h1>
    <hr>

    <form action="{{ route('trabajos.store') }}" method="POST">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Descripción del Trabajo *</label>
            <input type="text" name="descripcion" class="form-control" placeholder="Ej: Tesis de 200 hojas anillada" required>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Nombre del Cliente *</label>
                <input type="text" name="cliente" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Teléfono *</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label">Fecha de Entrega *</label>
                <input type="date" name="fecha_entrega" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="form-label">Estado Inicial</label>
                <select name="estado" class="form-select" required>
                    <option value="Pendiente">Pendiente</option>
                    <option value="En Proceso">En Proceso</option>
                </select>
            </div>
        </div>

        <a href="{{ route('trabajos.index') }}" class="btn btn-secondary">Cancelar</a>
        <button type="submit" class="btn btn-primary">Guardar Orden</button>
    </form>
@endsection