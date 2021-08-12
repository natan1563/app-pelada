<?php

namespace App\Http\Controllers;

use App\Models\Pelada;
use App\Models\User;
use Illuminate\Http\Request;

class PeladaController extends Controller
{

   public function index()
   {
       return response()->json(Pelada::all());
   }

   public function store(Request $request)
   {
       $this->validate($request, [
            'nomeEvento' => 'required',
            'data'       => 'required',
            'hora'       => 'required',
            'local'      => 'required'
       ]);

       Pelada::create($request->all());

       return response()->json([
           'pelada_criada' => true
       ], 201);
   }
}
