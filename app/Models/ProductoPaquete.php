<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoPaquete extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'producto_paquete';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_producto',
        'id_paquete',
        'cantidad',
    ];

    /**
     * Relación con producto
     */
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    /**
     * Relación con paquete
     */
    public function paquete()
    {
        return $this->belongsTo(Paquete::class, 'id_paquete');
    }
} 