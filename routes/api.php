<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\TelefoneController;
use App\Http\Controllers\PeticaoController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\EnderecoController;
use App\Http\Controllers\AuthController;


// // Authenticated only API
// // We use auth api here as a middleware so only authenticated user who can access the endpoint
// // We use group so we can apply middleware auth api to all the routes within the group
// Route::group(['middleware' => ['jwt.auth']], function () {
//     //SUAS ROTAS AQUI
// Route::post('/logout', [AuthController::class,'logout']);
// Route::post('/refresh', [AuthController::class,'refresh']);
// Route::get('/me', [AuthController::class, 'me']);

// //
// // Route::post('email/verification-notification', [EmailVerificationController::class, 'sendVerificationEmail']);
// // Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

// //Rota de usuario
// Route::get('/usuarios', [UsuarioController::class, 'index']);
// Route::get('/usuarios/{id}', [UsuarioController::class, 'show']);
// Route::get('/usuariosCPF/{id}', [UsuarioController::class, 'showPeloCPF']);
// Route::get('/usuarios/recuperarsenha/{email}', [UsuarioController::class, 'recuperarSenha']);
// Route::post('/usuarios', [UsuarioController::class, 'store']);
// Route::put('/usuarios/{id}', [UsuarioController::class, 'update']);
// Route::delete('/usuarios/{id}', [UsuarioController::class, 'destroy']);

// //Rota de telefone
// Route::get('/telefones', [TelefoneController::class, 'index']);
// Route::post('/telefones', [TelefoneController::class, 'store']);
// Route::get('/telefones/{id}', [TelefoneController::class, 'show']);
// Route::put('/telefones/{id}', [TelefoneController::class, 'update']);
// Route::delete('/telefones/{id}', [TelefoneController::class, 'destroy']);

// //Rota de petição
// Route::get('/peticaos', [PeticaoController::class, 'index']);
// Route::get('/peticaos/{id}', [PeticaoController::class, 'show']);
// Route::post('/peticaos', [PeticaoController::class, 'store']);
// Route::put('/peticaos/{id}', [PeticaoController::class, 'update']);
// Route::delete('peticaos/{id}', [PeticaoController::class, 'destroy']);
// //Rota de endereços
// Route::post('/endereco', [EnderecoController::class, 'store']);

// //Rota de upload
// Route::post('/upload', [UploadController::class, 'upload']);
// });


// Public accessible API
// Route::post('/register', [AuthController::class, 'register']);
// Route::post('/login', [AuthController::class,'login']);
// Route::post('logout', [AuthController::class, 'logout'])->middleware('jwt.auth');

// Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
// Route::post('reset-password', [NewPasswordController::class, 'reset']);
Route::prefix('v1')->group(function () {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);




    Route::group(['middleware' => ['jwt.auth']], function () {
      Route::post('/logout', [AuthController::class, 'logout']);
    });

  });
