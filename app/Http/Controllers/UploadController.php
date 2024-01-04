<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $arquivo = $request->file('imagem');
        //$arqNome = $request->file('imagem')->getClientOriginalName();
        
        if($request->hasfile('imagem'))
        {
            //return response()->json('sucesso');

            foreach($request->file('imagem') as $imagem)
            {
                //$name=$imagem->getClientOriginalName();
                //$image->move(public_path().'/images/', $name);
                $arqCaminho = $imagem->file('imagem')->store('public/uploads');
                //$data[] = $name;
            }
        }
        //return response()->json('não entrou');

    //     $form= new Form();
    //     $form->filename=json_encode($data);
        
       
    //    $form->save();
        
        //$arquivo = $request->file('imagem');
        //$arqNome = $request->file('imagem')->getClientOriginalName();
        //$arqCaminho = $arquivo->store('public/uploads');
        //$path = hash( 'sha256', time());
        
        // if($arqCaminho) {
            
        //     $post = new Upload();
        //     $post->ARQU_NM = $arqNome;
        //     $post->ARQU_TP = $request->file('imagem')->getClientMimeType();
        //     $post->ARQU_PATH = $arqCaminho;
        //     $post->PETI_ID_FK = 3;
        //     $post->save();

        //     return response()->json([
        //         'success' => true
        //     ], 200);
        // }
        // return response()->json([
        //     'success' => false
        // ], 500);

        return response()->json($arquivo);
    }
}
