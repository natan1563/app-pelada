<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Exception;
use Firebase\JWT\JWT;

class Autenticador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        try {
            if (!$request->hasHeader('Authorization')) {
                throw new Exception('Token não informado');
             }

             $authorizationHeader = $request->header('Authorization');
             $token = str_replace('Bearer ', '', $authorizationHeader);
             $dadosAutenticacao = JWT::decode($token, env('JWT_TOKEN'), ['HS256']);
             $user = User::where('email', $dadosAutenticacao->email)->first();

             if (is_null($user)) throw new Exception('Usuario não encontrado');

             return $next($request);
        } catch (Exception $e) {
            return response()->json($e->getMessage(), 401);
        }
    }
}
