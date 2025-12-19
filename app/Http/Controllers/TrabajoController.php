<?php

namespace App\Http\Controllers;

use App\Models\Trabajo;
use Illuminate\Http\Request;

class TrabajoController extends Controller
{
    //LISTA DE TRABAJOS
    public function index()
    {
        $trabajos = Trabajo::getTrabajos();
        return view('trabajos.index', compact('trabajos'));
    }

    //CREAR (CREATE)
    public function create()
    {
        return view('trabajos.create');
    }

    //ALMACENAR EN BDD
    public function store(Request $request)
    {
      
        $request->validate([
            'descripcion'   => 'required',
            'cliente'       => 'required',
            'telefono'      => 'required',
            'fecha_entrega' => 'required|date',
            'estado'        => 'required'
        ]);

        Trabajo::createTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo registrado correctamente.');
    }

    
    public function edit(Trabajo $trabajo)
    {
        return view('trabajos.edit', compact('trabajo'));
    }
        //ACTURALIZAR (UPDATE)
    public function update(Request $request, Trabajo $trabajo)
    {
        $request->validate([
            'descripcion'   => 'required',
            'cliente'       => 'required',
            'telefono'      => 'required',
            'fecha_entrega' => 'required|date',
            'estado'        => 'required'
        ]);

        $trabajo->updateTrabajo($request->all());

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo actualizado correctamente.');
    }

    // ELIMINAR TRABAJO (DELETE)
    public function destroy(Trabajo $trabajo)
    {
        Trabajo::deleteTrabajo($trabajo);

        return redirect()->route('trabajos.index')
            ->with('success', 'Trabajo eliminado.');
    }
}

