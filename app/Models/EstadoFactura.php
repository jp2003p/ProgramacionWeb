<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadoFactura extends Model
{
    protected $table = 'estadosfacturas';

    use HasFactory;

    /*
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_estado');
    }*/
}
