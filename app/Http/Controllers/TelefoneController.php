<?php

namespace App\Http\Controllers;

use App\Models\Telefone;
use Illuminate\Http\Request;


class TelefoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $telefone = Telefone::all();
        return response()->json($telefone);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $telefone = new Telefone;
        $telefone->USUA_CD_TELEFONE = $request->input('TELEFONE.telefone');
        $telefone->USUA_ID_FK = $request->input('USUA_ID');
        $telefone->save();
        return response()->json([
            "message" => "Telefone Adicionado!"
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $telefone = Telefone::find($id);
        if (!empty($telefone))
        {
            return response()->json($telefone);
        }else {
            return response()->json([
                "message" => "Telefone não encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if(Telefone::where('USUA_CD_TELEFONE_ID', $id)->exists()){
            $telefone = Telefone::find($id);
            $telefone->USUA_CD_TELEFONE = is_null($request->input('TELEFONE.telefone'))? $telefone->USUA_CD_TELEFONE:$request->input('TELEFONE.telefone');
            $telefone->USUA_ID_FK = $request->USUA_ID_FK;
            $telefone->save();
            return response()->json([
                "message" => "Telefone Atualizado"
                ], 200 );
            }else {
                return response()->json([
                    "message" => "Telefone não encontrado"
                ], 404);
            }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if(Telefone::where('USUA_CD_TELEFONE_ID', $id)->exists()){
            $telefone = Telefone::find($id);
            $telefone->delete();
          return response()->json([
            "message" => "Telefone deletado"
            ], 202);
        }else {
            return response()->json([
              "message" => "Telefone não encontrado"
            ], 404);
        }
    }
}
