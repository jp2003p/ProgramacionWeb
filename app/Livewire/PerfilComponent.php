<?php

namespace App\Livewire;

use App\Models\Perfil;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class PerfilComponent extends Component
{
    use WithPagination;
    public $openCreate = false;
    public $openUpdate = false;
    public $nombreCreate;
    public $nombreUpdate;
    public $perfilId;
    public $nombrePerfilBuscar;


    #[Title('perfiles')]  
    public function render()
    {
        $query = Perfil::orderBy('id', 'desc');

        if (trim($this->nombrePerfilBuscar) !== '') {
            $query->where('nombre', 'LIKE', '%' . $this->nombrePerfilBuscar . '%');
        }

        $perfiles = $query->paginate(3);
        return view('livewire.perfil-component', compact('perfiles'));
    }

    public function create()
    {
        $this->openCreate = true;
    }

    public function store()
    {
        $this->validate(['nombreCreate' => 'required']);

        try {
            $perfil = Perfil::create([
                'nombre' => $this->nombreCreate
            ]);
            // $this->perfiles = Perfil::all();
            $this->dispatch("succes-process", mensaje: 'El perfil se inserto correctamente');
            $this->reset('nombreCreate', 'openCreate');
        } catch (\Exception $ex) {
            $this->dispatch("failed-process", mensaje: 'Ocurrio un error al insertar el perfil');
        }
    }

    public function edit($id)
    {
        $perfil = Perfil::find($id);
        $this->perfilId = $id;
        $this->nombreUpdate = $perfil->nombre;
        $this->openUpdate = true;
    }

    public function update()
    {
        $this->validate(['nombreUpdate' => 'required']);
        
        try {
            $perfil = Perfil::find($this->perfilId);
            $perfil->update([
                'nombre' => $this->nombreUpdate,
            ]);
            //$this->perfiles = Perfil::all();
            $this->nombreUpdate = '';
            $this->openUpdate = false;
            $this->reset('nombreUpdate', 'openUpdate');
            $this->dispatch("succes-process", mensaje: 'Se actualizo correctamente el perfil');
        } catch (\Throwable $th) {
            $this->dispatch("failed-process", mensaje: 'Ocurrio un error al actualizar el perfil');
        }

    }

    public function destroy($id)
    {
        $perfil =  Perfil::find($id);
        $perfil->delete();
        $this->dispatch("succes-process", mensaje: 'El perfil se elimino correctamente');
        //$this->perfiles = Perfil::all();
    }

    public function search()
    {
        //$this->perfiles = DB::table('perfils')->where('nombre', 'LIKE', '%' . $this->nombrePerfilBuscar . '%')->get();
    }
}


