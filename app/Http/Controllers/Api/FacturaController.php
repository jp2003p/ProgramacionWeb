<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $facturas = Factura::with(['cliente', 'formapago', 'estado'])->get();
        return $facturas;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $now = now()->format('Y-m-d');
        $extension = $this->$request->file('archivo')->getClientOriginalExtension();
        $fileName = "factura-{$this->$request->numero}-{$now}.{$extension}";

        return Factura::create([
            'numero' => $request->numero,
            'detalles' => $request->detalles,
            'valor' => $request->valor,
            'archivo' => $request->$fileName,
            'id_cliente' => $request->id_cliente,
            'id_forma' => $request->id_forma,
            'id_estado' => $request->id_estado,
        ]);

        //Mail::to(Auth::user()->email)->send(new CreateFacturaMailable($this->numeroCreate, $this->valorCreate, Auth::user()->name));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $factura = Factura::find($id);

        if ($request->archivo) {
            $now = now()->format('Y-m-d');
            $extension = $this->$request->input('archivo')->getClientOriginalExtension();
            $fileName = "factura-{$request->numero}-u-{$now}.{$extension}";
            $arch = $this->$request->input('archivo')->storeAs('archivos', $fileName);
            $factura->update(['archivo' => $arch]);
        }

        $factura->update([
            'numero' => $request->numero,
            'detalles' => $request->detalles,
            'valor' => $request->valor,
            'id_cliente' => $request->id_cliente,
            'id_forma' => $request->id_forma,
            'id_estado' => $request->id_estado,
        ]);
        return $factura;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $factura = Factura::find($id);
        $factura->delete();
        return $factura;
    }
}
