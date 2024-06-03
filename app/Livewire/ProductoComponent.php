<?php

namespace App\Livewire;

use App\Models\Producto;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithPagination;

class ProductoComponent extends Component
{
    use WithPagination;

    public function mount()
    {
        if (!session()->has('carrito')) {
            session()->put('carrito', array());
        }
    }


    #[Title('productos')]
    public function render()
    {
        $query = Producto::orderBy('id', 'desc');;
        $productos = $query->paginate(8);
        return view('livewire.producto-component', compact('productos'));
    }

    public function agregar($id)
    {
        $carrito = session()->get('carrito');
        $producto = Producto::find($id);
        $carrito[$producto->id] = $producto;
        session()->put('carrito', $carrito);
    }

}
