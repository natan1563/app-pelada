<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function login(Request $request)
    {
        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario) || Hash::check($request->senha, $usuario->senha)) {
            return response()->json(
                [
                    'auth'    => false,
                    'message' => 'Usuário ou senha inválidos.'
                ]);
            }

        return response()->json(
            [
                'auth'         => true,
                'message'      => 'Login efetuado com sucesso!',
                'access_token' => JWT::encode(['email' => $request->email], env('JWT_TOKEN'), 'HS256')
            ], 200);
    }

    public function store(Request $request) {
        try {
            $this->validate($request, [
                'nomeCompleto' => 'required',
                'apelido'      => 'required',
                'email'        => 'required|email',
                'senha'        => 'required'
            ]);

            User::create($request->all());
            return response()->json('Usuario criado com sucesso', 201);

        } catch (Exception $e) {
            return response()->json($e->getMessage(), 500);
        }

    }
}
