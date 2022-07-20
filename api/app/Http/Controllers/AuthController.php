<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Cria uma nova instância do AuthController
    public function login(LoginRequest $request)
    {
        $input = $request->validated(); // Valida os dados do request com base no LoginRequest

        if (!$token = auth()->attempt($input)) { // Verifica se o usuário existe e se a senha está correta, caso correto, atribui o valor retornado à variável $token, em seguida verifica se ela é inválida.
            return response()->json(['error' => 'Unauthorized'], 401); // Se não existir, retorna erro 401 e mensagem de erro 'Unauthorized'
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]); // Retorna o token e o tipo do token (bearer) e o tempo de expiração do token
    }

    // Retorna o usuário logado
    public function me()
    {
        return response()->json(auth()->user());
    }

    // Desloga o usuário
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }
}
