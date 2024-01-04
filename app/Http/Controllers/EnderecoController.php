<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;
use App\Models\Usuario;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $endereco = Endereco::all();
        return response()->json($endereco);
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
        $endereco = new Endereco;
        $endereco->END_CEP= $request->input('dadosEndereco.cep');
        $endereco->END_LOG = $request->input('dadosEndereco.logradouro');
        $endereco->END_COMP = $request->input('dadosEndereco.complemento');
        $endereco->END_CID = $request->input('dadosEndereco.localidade');
        $endereco->END_BAI = $request->input('dadosEndereco.bairro');
        $endereco->END_UF = $request->input('dadosEndereco.uf');
        $endereco->END_REF = $request->input('dadosEndereco.referencia');
        $endereco->USUA_ID_FK = $request->input('USUA_ID');
        $endereco->save();

        return response()->json([
            "message" => "Endereço Adicionado!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        if(endereco::where('USUA_ID', $id)->exists()){
            $endereco = Usuario::find($id);


            $endereco->USUA_NM = is_null($request->input('dadosEndereco.cep'))? $endereco->USUA_NM:$request->input('dadosEndereco.cep');
            $endereco->END_LOG = is_null($request->input('dadosEndereco.logradouro'))?$endereco->END_LOG:$request->input('dadosEndereco.logradouro');
            $endereco->END_COMP = is_null($request->input('dadosEndereco.complemento'))? $endereco->END_COMP:$request->input('dadosEndereco.complemento');
            $endereco->END_CID = is_null($request->input('dadosEndereco.localidade'))? $endereco->END_CID:$request->input('dadosEndereco.localidade');
            $endereco->END_BAI = is_null($request->input('dadosEndereco.bairro'))? $endereco->END_BAI:$request->input('dadosEndereco.bairro');
            $endereco->END_UF = is_null($request->input('dadosEndereco.uf'))? $endereco->END_UF:$request->input('dadosEndereco.uf');
            $endereco->END_REF= is_null($request->input('dadosEndereco.referencia'))? $endereco->END_UF:$request->input('dadosEndereco.referencia');
            $endereco->USUA_ID_FK  = is_null($request->input('USUA_ID')) ? $endereco->USUA_ID_FK:$request->input('USUA_ID');
            $endereco->save();

            return response()->json([
                    "message" => "Usuario Atualizado"
                ], 200);
            }else {
                return response()->json([
                    "message" => "Usuario não encontrado"
                ], 404);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
