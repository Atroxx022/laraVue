<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipodoc = Pedido::select('tipo_doc')
        ->groupBy('tipo_doc')
        ->get();

        return $tipodoc;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $criterio, string $criterio2, string $criterio3)
    {
        $pedido = Pedido::select('CodigoPedido','clientes.Nombre','clientes.Direccion','producto','estado','fechaEntrega')
        ->join('clientes', 'clientes.Doc','=','pedidos.DocCliente')
        ->where('CodigoPedido', '=', $criterio)
        ->where('tipo_doc', '=', $criterio2)
        ->where('DocCliente', '=', $criterio3)
        ->get();

        return response()->json([
            "criterio" => $criterio,
            "criterio2" => $criterio2,
            "criterio3" => $criterio3,
            "success" => true,
            "pedido" => $pedido
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
