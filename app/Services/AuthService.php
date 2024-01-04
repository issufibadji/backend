<?php

namespace App\Services;

use App\Exceptions\LoginIvalidException;
use App\Exceptions\UserHasBeenTakenException;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Str;



class AuthService{

    public function login(string $email, string $password) {
        $login = [
            'USUA_TX_EMAIL'=> $email,
            'password' => $password
            ];

        if (!$token = auth()->attempt(($login))) {

            throw new LoginIvalidException();

        }return[
            'access_token' => [
                'token' => $token,
                'type' => 'Bearer',
                'expires_in' => JWTAuth::factory()->getTTL() * 24,
        ]
        ];

    }

    public function register(string $nome, string $cpf, string $email, string $password, )
    {

        $usuario = Usuario::where('USUA_TX_EMAIL', $email)->exists();
        if (!empty($usuario)) {
            throw new UserHasBeenTakenException();
        }

        $UserPassword = bcrypt($password?? Str::random(8));

        $usuario = Usuario::create([
            'USUA_NM' =>$nome,
            'USUA_CD_CPF' =>$cpf,
            'USUA_TX_EMAIL' => $email,
            'USUA_TX_SENHA' =>$UserPassword,
            'USUA_CONF_TOKEN' => Str::random(),
        ]);

        return $usuario;

    }



}
