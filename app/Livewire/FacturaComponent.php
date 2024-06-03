<?php

namespace App\Livewire;

use App\Models\Factura;
use App\Models\Cliente;
use App\Models\Formaspago;
use App\Models\Estadofactura;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use App\Mail\CreateFacturaMailable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class FacturaComponent extends Component
{
    use WithFileUploads;

    public $facturas;
    public $openCreate = false;
    public $openUpdate = false;
    public $numeroCreate, $detallesCreate, $valorCreate, $archivoCreate, $clienteIdCreate, $formaPagoIdCreate, $estadoIdCreate;
    public $numeroUpdate, $detallesUpdate, $valorUpdate, $archivoUpdate, $clienteIdUpdate, $formaPagoIdUpdate, $estadoIdUpdate;
    public $facturaId;
    public $nombreBuscar;
    

    #[Title('facturas')]
    public function render()
    {
        if($this->nombreBuscar === null){
            $this->facturas = Factura::all();
        }
        $clientes = Cliente::all();
        $formaspago = Formaspago::all();
        $estados = Estadofactura::all();
        return view('livewire.factura-component', ['facturas' => $this->facturas, 'clientes' => $clientes, 'formaspago' => $formaspago, 'estados' => $estados]);
    }

    public function create()
    {
        $this->openCreate = true;
    }

    public function store()
    {
        $this->validate([
            'numeroCreate' => 'required|unique:facturas,numero',
            'detallesCreate' => 'required',
            'valorCreate' => 'required|numeric',
            'archivoCreate' => 'required',
            'clienteIdCreate' => 'required|exists:clientes,id',
            'formaPagoIdCreate' => 'required|exists:formaspago,id',
            'estadoIdCreate' => 'required|exists:estadosfacturas,id'
        ]);

        $now = now()->format('Y-m-d');
        $extension = $this->archivoCreate->getClientOriginalExtension();
        $fileName = "factura-{$this->numeroCreate}-{$now}.{$extension}";

        Factura::create([
            'numero' => $this->numeroCreate,
            'detalles' => $this->detallesCreate,
            'valor' => $this->valorCreate,
            'archivo' => $this->archivoCreate->storeAs('archivos', $fileName),
            'id_cliente' => $this->clienteIdCreate,
            'id_forma' => $this->formaPagoIdCreate,
            'id_estado' => $this->estadoIdCreate,
        ]);

        Mail::to(Auth::user()->email)->send(new CreateFacturaMailable($this->numeroCreate, $this->valorCreate, Auth::user()->name));

        $this->facturas = Factura::with(['cliente', 'formapago', 'estado'])->get();
        $this->reset(['numeroCreate', 'detallesCreate', 'valorCreate', 'archivoCreate', 'clienteIdCreate', 'formaPagoIdCreate', 'estadoIdCreate']);
        $this->openCreate = false;
        $this->dispatch("succes-process", mensaje: 'La factura se creo correctamente');
    }

    public function edit($id)
    {
        $factura = Factura::with(['cliente', 'formapago', 'estado'])->find($id);
        $this->facturaId = $id;
        $this->numeroUpdate = $factura->numero;
        $this->detallesUpdate = $factura->detalles;
        $this->valorUpdate = $factura->valor;
        //$this->archivoUpdate = $factura->archivo;
        $this->clienteIdUpdate = $factura->id_cliente;
        $this->formaPagoIdUpdate = $factura->id_forma;
        $this->estadoIdUpdate = $factura->id_estado;
        $this->openUpdate = true;
    }

    public function update()
    {

        $factura = Factura::find($this->facturaId);

        $this->validate([
            'numeroUpdate' => 'required',
            'detallesUpdate' => 'required',
            'valorUpdate' => 'required|numeric',
            'clienteIdUpdate' => 'required|exists:clientes,id',
            'formaPagoIdUpdate' => 'required|exists:formaspago,id',
            'estadoIdUpdate' => 'required|exists:estadosfacturas,id'
        ]);

        if ($this->archivoUpdate) {
            $now = now()->format('Y-m-d');
            $extension = $this->archivoUpdate->getClientOriginalExtension();
            $fileName = "factura-{$factura->numero}-u-{$now}.{$extension}";
            $arch = $this->archivoUpdate->storeAs('archivos', $fileName);
            $factura->update(['archivo' => $arch]);
        }

        $factura->update([
            'numero' => $this->numeroUpdate,
            'detalles' => $this->detallesUpdate,
            'valor' => $this->valorUpdate,
            'id_cliente' => $this->clienteIdUpdate,
            'id_forma' => $this->formaPagoIdUpdate,
            'id_estado' => $this->estadoIdUpdate,
        ]);

        $this->facturas = Factura::with(['cliente', 'formapago', 'estado'])->get();
        $this->reset(['numeroUpdate', 'detallesUpdate', 'valorUpdate', 'archivoUpdate', 'clienteIdUpdate', 'formaPagoIdUpdate', 'estadoIdUpdate']);
        $this->openUpdate = false;
        $this->facturas = Factura::all();
        $this->dispatch("succes-process", mensaje: 'La factura se actualizo correctamente');
    }

    public function destroy($id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        $this->facturas = Factura::with(['cliente', 'formapago', 'estado'])->get();
        $this->dispatch("succes-process", mensaje: 'La factura se elimino correctamente');
    }
    
    public function search()
    {
        $this->facturas = Factura::with(['cliente', 'formapago', 'estado'])->where('id', '=', $this->nombreBuscar)->get();   
    }

}
