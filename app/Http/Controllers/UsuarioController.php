<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
Use App\Http\Requests\UsuarioStoreRequest;

class UsuarioController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuario = Usuario::all();
        return response()->json($usuario);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = new Usuario;
        $usuario->USUA_NM = $request->input("dadosPessoaisAt.nome");
        $usuario->USUA_CD_CPF = $request->input("dadosPessoaisAt.cpf");
        $usuario->USUA_RG = $request->input("dadosPessoaisAt.rg");
        $usuario->USUA_PROF = $request->input("dadosPessoaisAt.profissao");
        $usuario->USUA_NACIO = $request->input("dadosPessoaisAt.pais");
        $usuario->USUA_ES_CIVIL = $request->input("dadosPessoaisAt.estadocivil");
        $usuario->USUA_TX_EMAIL = $request->input("dadosPessoaisAt.email");
        $usuario->USUA_TX_SENHA =bcrypt($request->input("dadosPessoaisAt.password"));
        $usuario->save();

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::find($id);
        if (!empty($usuario))
        {
            return response()->json($usuario);
        }else {
            return response()->json([
                "message" => "Usuario não encontrado"
            ], 200);
        }
    }

    public function showPeloCPF(string $cpf)
    {
        $usuario = Usuario::where('USUA_CD_CPF', $cpf)->first();
        if (!empty($usuario))
        {
            return response()->json($usuario);
        }else {
            return response()->json([
                "message" => "Usuario não encontrado"
            ], 200);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UsuarioStoreRequest $request, string $id)
    {

        if(usuario::where('USUA_ID', $id)->exists()){
            $usuario = Usuario::find($id);

            $usuario->USUA_NM = is_null($request->input('dadosPessoaisAt.nome'))? $usuario->USUA_NM:$request->input('dadosPessoaisAt.nome');
            // $usuario->USUA_CD_CPF = is_null($request->input('dadosPessoaisAt.cpf'))? $usuario->USUA_CD_CPF:$request->input('dadosPessoaisAt.cpf');
            $usuario->USUA_RG = is_null($request->input('dadosPessoaisAt.rg'))? $usuario->USUA_RG:$request->input('dadosPessoaisAt.rg');
            $usuario->USUA_PROF = is_null($request->input('dadosPessoaisAt.profissao'))? $usuario->USUA_PROF:$request->input('dadosPessoaisAt.profissao');
            $usuario->USUA_NACIO = is_null($request->input('dadosPessoaisAt.pais'))? $usuario->USUA_NACIO:$request->input('dadosPessoaisAt.pais');
            $usuario->USUA_ES_CIVIL = is_null($request->input('dadosPessoaisAt.estadocivil'))? $usuario->USUA_ES_CIVIL:$request->input('dadosPessoaisAt.estadocivil');
            // $usuario->USUA_TX_EMAIL = is_null($request->input('dadosPessoaisAt.email')) ? $usuario->USUA_TX_EMAIL:$request->input('dadosPessoaisAt.email');
            $usuario->USUA_TX_SENHA = is_null($request->input('dadosPessoaisAt.password')) ? $usuario->USUA_TX_SENHA:$request->input('dadosPessoaisAt.password');
            $usuario->save();

            return response()->json([
                    "message" => "Usuario Atualizado"
                ], 200);
            }else {
                return response()->json([
                    "message" => "Usuario não encontrado"
                ], 404);
            }
    }

    public function recuperarSenha(Request $request, string $email)
    {
        if(Usuario::where('USUA_TX_EMAIL', $email)->exists()){
            $usuario = Usuario::where('USUA_TX_EMAIL', $email)->first();

            config('APP_URL')."/recuperarsenha=1d2asd16a5s1da6sd1";
        }else{
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
        if(Usuario::where('USUA_ID', $id)->exists()){
            $usuario = Usuario::find($id);
            $usuario->delete();
          return response()->json([
            "message" => "Usuario deletado"
            ], 202);
        }else {
            return response()->json([
              "message" => "Usuario não encontrado"
            ], 404);
        }
    }
}
