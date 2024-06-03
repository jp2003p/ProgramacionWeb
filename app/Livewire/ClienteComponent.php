<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Title;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteComponent extends Component
{

    public $clientes;
    public $openCreate = false;
    public $openUpdate = false;
    public $nombreCreate, $rfcCreate, $direccionCreate, $telefonoCreate, $emailCreate;
    public $nombreUpdate, $rfcUpdate, $direccionUpdate, $telefonoUpdate, $emailUpdate;
    public $clienteId;
    public $nombreBuscar;

    #[Title('clientes')]
    public function render()
    {
        if ($this->nombreBuscar === null) {
            $this->clientes = Cliente::all();
        }
        return view('livewire.cliente-component');
    }



    /*
    protected $rules = [
        'nombreCreate' => 'required',
        'rfcCreate' => 'required',
        'direccionCreate' => 'required',
        'telefonoCreate' => 'required',
        'emailCreate' => 'required|email',
        'nombreUpdate' => 'required',
        'rfcUpdate' => 'required',
        'direccionUpdate' => 'required',
        'telefonoUpdate' => 'required',
        'emailUpdate' => 'required|email',
    ];*/

    public function create()
    {
        $this->openCreate = true;
    }

    public function store()
    {
        $this->validate([
            'nombreCreate' => 'required',
            'rfcCreate' => 'required',
            'direccionCreate' => 'required',
            'telefonoCreate' => 'required',
            'emailCreate' => 'required|email',
        ]);

        Cliente::create([
            'nombre' => $this->nombreCreate,
            'rfc' => $this->rfcCreate,
            'direccion' => $this->direccionCreate,
            'telefono' => $this->telefonoCreate,
            'email' => $this->emailCreate,
        ]);

        $this->clientes = Cliente::all();
        $this->reset(['nombreCreate', 'rfcCreate', 'direccionCreate', 'telefonoCreate', 'emailCreate']);
        $this->openCreate = false;
        $this->dispatch("succes-process", mensaje: 'Se inserto correctamente el cliente');
    }

    public function edit($id)
    {
        $cliente = Cliente::find($id);
        $this->clienteId = $id;
        $this->nombreUpdate = $cliente->nombre;
        $this->rfcUpdate = $cliente->rfc;
        $this->direccionUpdate = $cliente->direccion;
        $this->telefonoUpdate = $cliente->telefono;
        $this->emailUpdate = $cliente->email;
        $this->openUpdate = true;
    }

    public function update()
    {
        $this->validate([
            'nombreUpdate' => 'required',
            'rfcUpdate' => 'required',
            'direccionUpdate' => 'required',
            'telefonoUpdate' => 'required',
            'emailUpdate' => 'required|email',
        ]);

        $cliente = Cliente::find($this->clienteId);
        $cliente->update([
            'nombre' => $this->nombreUpdate,
            'rfc' => $this->rfcUpdate,
            'direccion' => $this->direccionUpdate,
            'telefono' => $this->telefonoUpdate,
            'email' => $this->emailUpdate,
        ]);

        $this->clientes = Cliente::all();
        $this->reset(['nombreUpdate', 'rfcUpdate', 'direccionUpdate', 'telefonoUpdate', 'emailUpdate']);
        $this->openUpdate = false;
        $this->dispatch("succes-process", mensaje: 'Se actualizo correctamente el cliente');
    }

    public function destroy($id)
    {
        $cliente = Cliente::find($id);
        $cliente->delete();
        $this->clientes = Cliente::all();
        $this->dispatch("succes-process", mensaje: 'Se elimino correctamente el cliente');
    }

    public function search()
    {
        $this->clientes = DB::table('clientes')->where('nombre', 'LIKE', '%' . $this->nombreBuscar . '%')->get();
    }
}
