<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'rfc', 'direccion', 'telefono', 'email'];

    use HasFactory;

    public function facturas()
    {
        return $this->hasMany(Factura::class);
    }
}
