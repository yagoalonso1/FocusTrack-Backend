<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lista extends Model
{
    use HasFactory;

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = 'id_lista';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nombre',
        'descripcion',
        'id_padre',
    ];

    /**
     * Relación con paquetes
     */
    public function paquetes()
    {
        return $this->belongsToMany(Paquete::class, 'paquete_lista', 'id_lista', 'id_paquete')
                    ->withTimestamps();
    }

    /**
     * Relación con lista padre (jerarquía)
     */
    public function padre()
    {
        return $this->belongsTo(Lista::class, 'id_padre', 'id_lista');
    }

    /**
     * Relación con listas hijas (jerarquía)
     */
    public function hijas()
    {
        return $this->hasMany(Lista::class, 'id_padre', 'id_lista');
    }
} 