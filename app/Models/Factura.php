<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\FormasPago;
use App\Models\EstadoFactura;

class Factura extends Model
{

    protected $fillable = ['numero', 'detalles', 'valor', 'archivo', 'id_cliente', 'id_forma', 'id_estado'];
    use HasFactory;


    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    public function formaPago()
    {
        return $this->belongsTo(FormasPago::class, 'id_forma');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoFactura::class, 'id_estado');
    }
}
