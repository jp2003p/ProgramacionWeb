<?php

namespace App\Livewire;

use App\Models\Pedido;
use App\Models\Producto;
use DateTime;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\On;

class CarritoComponent extends Component
{
    #[Title('orden')]
    public function render()
    {
        $productos = session()->get('carrito');
        $total = 0;

        foreach ($productos as $producto => $value) {
            $total += ($value->precio * $value->cantidad);
        }

        return view('livewire.carrito-component', compact('productos', 'total'));
    }

    public function delete($id)
    {
        $carrito = session()->get('carrito');
        unset($carrito[$id]);
        session()->put('carrito', $carrito);
    }

    #[On('update-value')]
    public function update($cantidad, $id)
    {
        $carrito = session()->get('carrito');
        $producto = Producto::find($id);
        $carrito[$producto->id]->cantidad = $cantidad;
        session()->put('carrito', $carrito);
    }

    public function vaciar()
    {
        $carrito = session()->get('carrito');
        session()->put('carrito', array());
    }

    public function guardarPedido() {
        $carrito = session()->get('carrito');
        if (count($carrito)) {
            $now = new DateTime();
            $numero = $now->format('Ymd-His');
            foreach ($carrito as $producto) {
               $this->guardarItem($producto, $numero);
            }
        }
        $this->vaciar();
        $this->dispatch('succes-process', mensaje: 'La orden se pidio correctamente');
    }

    public function guardarItem($producto, $numero)
    {
        Pedido::create([
            'numero' => $numero,
            'id_producto' => $producto->id,
            'cantidad' => $producto->cantidad,
            'precio' => $producto->precio
        ]);
    }
}
