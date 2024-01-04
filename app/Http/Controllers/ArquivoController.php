<?php

namespace App\Http\Controllers;

use App\Models\Arquivo;
use Illuminate\Http\Request;

class ArquivoController extends Controller
{
    public function uploadFile(Request $request) {
        
        $file = Input::file('file');
        $filename = $file->getClientOriginalName();

        $path = hash( 'sha256', time());

        if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
            $input['filename'] = $filename;
            $input['mime'] = $file->getClientMimeType();
            $input['path'] = $path;
            $input['size'] = $file->getClientSize();
            $file = Arquivo::create($input);

            return response()->json([
                'success' => true,
                'id' => $file->id
            ], 200);
        }
        return response()->json([
            'success' => false
        ], 500);
    }


    public function upload(Request $request) {
        
        $file = $request->file('imagem');
        $filename = $file->getClientOriginalName();

        //path = hash( 'sha256', time());

        return response()->json($filename);

        // if(Storage::disk('uploads')->put($path.'/'.$filename,  File::get($file))) {
        //     $input['filename'] = $filename;
        //     $input['mime'] = $file->getClientMimeType();
        //     $input['path'] = $path;
        //     $input['size'] = $file->getClientSize();
        //     $file = Arquivo::create($input);

        //     return response()->json([
        //         'success' => true,
        //         'id' => $file->id
        //     ], 200);
        // }
        // return response()->json([
        //     'success' => false
        // ], 500);
    }
}
