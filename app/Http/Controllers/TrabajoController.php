<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    public function index()
    {
        $trabajos = Trabajo::getTrabajos();
        return view('trabajos.index', compact('trabajos'));
    }

    public function create()
    {
        return view('trabajos.create');
    }

    public function store(Request $request)
    {
        // 1. Definimos las reglas
        $rules = [
            'descripcion'   => 'required|string|max:255',
            'cliente'       => 'required|string|max:100',
            'telefono'      => 'required|numeric', // Aquí obligamos a que sea número
            'fecha_entrega' => 'required|date',
            'estado'        => 'required'
        ];

        // 2. Definimos los mensajes personalizados en español
        $messages = [
            'telefono.numeric'  => 'El teléfono solo debe contener números.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'cliente.required'  => 'El nombre del cliente es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_entrega.required' => 'La fecha de entrega es obligatoria.'
        ];

        // 3. Ejecutamos la validación con nuestros mensajes
        $request->validate($rules, $messages);

        Trabajo::createTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }

    public function show(Trabajo $trabajo)
    {
        return view('trabajos.show', compact('trabajo'));
    }

    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }

    public function update(Request $request, Trabajo $trabajo)
    {
        // Repetimos lo mismo para la actualización
        $rules = [
            'descripcion'   => 'required|string|max:255',
            'cliente'       => 'required|string|max:100',
            'telefono'      => 'required|numeric',
            'fecha_entrega' => 'required|date',
            'estado'        => 'required'
        ];

        $messages = [
            'telefono.numeric'  => 'El teléfono solo debe contener números.',
            'telefono.required' => 'El teléfono es obligatorio.',
            'cliente.required'  => 'El nombre del cliente es obligatorio.',
            'descripcion.required' => 'La descripción es obligatoria.',
            'fecha_entrega.required' => 'La fecha de entrega es obligatoria.'
        ];

        $request->validate($rules, $messages);

        $trabajo->updateTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }

    public function destroy(Trabajo $trabajo)
    {
        Trabajo::deleteTrabajo($trabajo);

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo eliminado.');
    }
}