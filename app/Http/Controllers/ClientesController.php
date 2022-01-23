<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClientesController extends Controller{

    
    public function index (){

        return Cliente::all();
    
    }

    public function show(int $id)
    {
        $cliente = Cliente::find($id);
              
        if(is_null($cliente)){
            return response()->json('',204);
        }
        
        return response()->json($cliente);
    }

    public function store(Request $request)
    {
       return response()->json(Cliente::create($request->all()), 201);

    }

    public function update(int $id, Request $request)
    {
        $cliente = Cliente::find($id);

       
        if(is_null($cliente)){
            return response()->json([
                'erro' => 'Cliente não encontrado'
            ],404);
        }
        $cliente->fill($request->all());
        $cliente->save();

        return response()->json($cliente, 200);
    }

    public function destroy(int $id)
    {
        $qtdClienteRemovidos = Cliente::destroy($id);
               
        if($qtdClienteRemovidos === 0){

            return response()->json([
                'erro' => 'Cliente Não encontrado'
            ],404);
        }    
     
        return response()->json('',204);
    }
}