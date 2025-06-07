<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_producto';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'color',
        'talla',
        'marca',
        'cantidad_comprada',
        'cantidad_disponible',
        'tipo',
        'precio_pagado',
        'precio_comprado',
        'precio_pagado_original',
        'precio_pagado_final',
        'precio_venta',
        'plataforma',
        'precio_envio',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'precio_pagado' => 'decimal:2',
            'precio_comprado' => 'decimal:2',
            'precio_pagado_original' => 'decimal:2',
            'precio_pagado_final' => 'decimal:2',
            'precio_venta' => 'decimal:2',
            'precio_envio' => 'decimal:2',
        ];
    }

    /**
     * Relación con paquetes
     */
    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'producto_paquete', 'id_producto', 'id_paquete')
                    ->withPivot('cantidad')
                    ->withTimestamps();
    }
} 