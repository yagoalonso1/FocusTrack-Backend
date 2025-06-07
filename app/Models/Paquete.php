<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_paquete';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'codigo_seguimiento',
        'estado',
        'ultima_actualizacion',
        'empresa_reparto',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'ultima_actualizacion' => 'datetime',
        ];
    }

    /**
     * Relación con productos
     */
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'producto_paquete', 'id_paquete', 'id_producto')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }

    /**
     * Relación con listas
     */
    public function listas()
    {
        return $this->belongsToMany(Lista::class, 'paquete_lista', 'id_paquete', 'id_lista')
                    ->withTimestamps();
    }

    /**
     * Relación con historial
     */
    public function historial()
    {
        return $this->hasMany(HistorialPaquetesPedido::class, 'id_paquete');
    }
} 