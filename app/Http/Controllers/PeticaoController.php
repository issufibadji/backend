<?php

namespace App\Http\Controllers;

use App\Models\Peticao;
use Illuminate\Http\Request;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\EnderecoController;
Use App\Http\Requests\UsuarioStoreRequest;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class PeticaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peticao = Peticao::all();
        return response()->json($peticao);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Usuario::where('USUA_CD_CPF', $request->input("dadosPessoaisAt.cpf"))->first()) {

            $usuario = Usuario::where('USUA_CD_CPF', $request->input("dadosPessoaisAt.cpf"))->first();

            $peticao = new Peticao;
            $peticao->PETI_TIPO_PROC = $request->input("tipoProcesso");
            $peticao->PETI_ORG = $request->input("orgao");
            $peticao->PETI_DESC_MEDI = $request->input("relatoPeticao");
            $peticao->PETI_ESPE_MEDI = $request->input("especialidadeMedica");
            $peticao->PETI_SINT_INCA = $request->input("sintomas");        ;
            $peticao->PETI_ATIV_EXER = $request->input("atividadeExercida");
            $peticao->PETI_DESC_INDI = $request->input("descrevaValor");
            $peticao->PETI_VAL_INDI = $request->input("valorIndenizacao");
            $peticao->PETI_CIEN_ACAO = $request->input("cienteAcoes");
            $peticao->PETI_REN_VAL = $request->input("renuncioValor");
            $peticao->PETI_RECE_EMAIL = $request->input("receberEmail");
            $peticao->USUA_ID_FK = $usuario->USUA_ID;
            $peticao->save();

            $usuario->USUA_NM = $request->input("dadosPessoaisAt.nome");
            //$usuario->USUA_CD_CPF = $request->input("dadosPessoaisAt.cpf");
            $usuario->USUA_RG = $request->input("dadosPessoaisAt.rg");
            $usuario->USUA_PROF = $request->input("dadosPessoaisAt.profissao");
            $usuario->USUA_NACIO = $request->input("dadosPessoaisAt.pais");
            $usuario->USUA_ES_CIVIL = $request->input("dadosPessoaisAt.estadocivil");
            //$usuario->USUA_TX_EMAIL = $request->input("dadosPessoaisAt.email");
            // $usuario->USUA_TX_SENHA = $request->USUA_TX_SENHA;
            $usuario->save();

            $request = $request->merge(['USUA_ID' => $usuario->USUA_ID]);

            foreach ($request->input("dadosPessoaisAt.telefone") as $telefone) {
                $request = $request->merge(['TELEFONE' => $telefone]);

                $telefone = new TelefoneController();
                $telefone->store($request);
            }

            $endereco = new EnderecoController();
            $endereco->store($request);

            return response()->json([
                "message" => "Peticao Adicionado!"
            ], 201);

        }else{
            return response()->json([
                "message" => "Usuario nao encontrado!"
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $peticao = Peticao::find($id);
        if (!empty($peticao)) {
            return response()->json($peticao);
        } else {
            return response()->json([
                "message" => "Peticâo não encontrado"
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        if (Peticao::where('PETI_ID', $id)->exists()) {
            $peticao = Peticao::find($id);

            $peticao->PETI_TIPO_PROC =  is_null($request->input("tipoProcesso"))? $peticao->PETI_TIPO_PROC:$request->input("tipoProcesso");
            $peticao->PETI_ORG =is_null($request->input("orgao"))? $peticao->PETI_ORG:$request->input("orgao") ;
            $peticao->PETI_DESC_MEDI = is_null($request->input("relatoPeticao"))? $peticao->PETI_DESC_MEDI:$request->input("relatoPeticao");
            $peticao->PETI_ESPE_MEDI = is_null($request->input("especialidadeMedica"))? $peticao->PETI_ESPE_MEDI:$request->input("especialidadeMedica");
            $peticao->PETI_SINT_INCA = is_null($request->input("sintomas"))? $peticao->PETI_SINT_INCA:$request->input("sintomas");
            $peticao->PETI_ATIV_EXER = is_null($request->input("atividadeExercida")) ? $peticao->PETI_ATIV_EXER:$request->input("atividadeExercida") ;
            $peticao->PETI_DESC_INDI =is_null($request->input("descrevaValor")) ? $peticao->PETI_DESC_INDI:$request->input("descrevaValor") ;
            $peticao->PETI_VAL_INDI = is_null($request->input("valorIndenizacao"))? $peticao->PETI_VAL_INDI:$request->input("valorIndenizacao");
            $peticao->PETI_CIEN_ACAO = is_null($request->input("cienteAcoes"))? $peticao->PETI_CIEN_ACAO:$request->input("cienteAcoes");
            $peticao->PETI_REN_VAL = is_null($request->input("renuncioValor"))? $peticao->PETI_REN_VAL:$request->input("renuncioValor");
            $peticao->PETI_RECE_EMAIL = is_null($request->input("receberEmail"))?$peticao->PETI_RECE_EMAIL:$request->input("receberEmail")   ;
            $peticao->USUA_ID_FK = $request->input('USUA_ID');
            $peticao->save();

            return response()->json([
                "message" => "Petição Atualizado"
            ], 200);
        }else {
            return response()->json([
                "message" => "Petição não encontrado"
            ], 404);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        if (Peticao::where('PETI_ID', $id)->exists()) {
            $peticao = Peticao::find($id);
            $peticao->delete();
            return response()->json([
                "message" => "Petição deletado"
            ], 202);
        } else {
            return response()->json([
                "message" => "Petição não encontrado"
            ], 404);
        }
    }
}
