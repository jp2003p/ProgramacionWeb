<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormasPago extends Model
{
    protected $table = 'formaspago';

    use HasFactory;

    /*
    public function facturas()
    {
        return $this->hasMany(Factura::class, 'id_forma');
    }*/
}
