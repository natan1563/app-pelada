<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function login(Request $request)
    {
        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario) || Hash::check($request->senha, $usuario->senha))
            return 'invalido';

        return response()->json(['auth' => true], 200);
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
