<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;
use App\Models\Usuario;
use App\Services\AuthService;


class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request):UserResource
    {
        $input = $request->validated();

        $token= $this->authService
           ->login(
                $input['USUA_TX_EMAIL'],
                $input['USUA_TX_SENHA']
             );

        return (new UserResource(Auth()->user()))->additional($token);
    }

    public function register(RegisterRequest $request):UserResource
     {

        $input = $request->validated();
        $usuario = $this->authService
                    ->register(
                    $input['USUA_NM'],
                    $input['USUA_CD_CPF'],
                    $input['USUA_TX_EMAIL'],
                    $input['USUA_TX_SENHA']
                );

        return new UserResource($usuario);
    }

}
