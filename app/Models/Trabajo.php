<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trabajo extends Model
{
    use HasFactory;

    protected $table = 'trabajos';

    protected $fillable = [
        'descripcion',
        'cliente',
        'telefono',
        'fecha_entrega',
        'estado'
    ];


    // --- Funciones para el Controlador ---

    static public function getTrabajos() {
        return self::all();
    }

    static public function getTrabajoById($id) {
        return self::find($id);
    }

    static public function createTrabajo($data) {
        return self::create($data);
    }

    public function updateTrabajo($data) {
        return $this->update($data);
    }

    static public function deleteTrabajo(Trabajo $trabajo) {
        return $trabajo->delete();
    }
}