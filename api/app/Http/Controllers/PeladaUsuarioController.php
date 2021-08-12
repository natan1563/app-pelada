<?php

namespace App\Http\Controllers;

use App\Models\Pelada;
use App\Models\User;
use App\Models\UsuariosPelada;
use Illuminate\Http\Request;

class PeladaUsuarioController extends Controller
{
    private Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function store()
   {
       $this->insertPeladaUsuario();
       return response()->json(['pelada_criada' => true], 201);
   }

   public function convidaPelada()
   {
       $this->insertPeladaUsuario(true);
       return response()->json(['pelada_criada' => true], 201);
   }

   public function update(int $id)
   {
        $pelada = UsuariosPelada::find($id);

        $this->validatePeladaUsuario();

        if (is_null($pelada)) return response()->json(['error' => 'Pelada não encontrada'], 404);

        $pelada->fill($this->request->all());
        $pelada->save();

        return response()->json(['success' => 'Pelada atualizada']);
   }

   public function cancel(int $id)
   {
        $participacao = UsuariosPelada::destroy($id);

        if (!$participacao) return response()->json(['error' => 'Participação não encontrada'], 404);

        return response()->json(['sucess' => 'Participação removida com sucesso']);
   }

   private function insertPeladaUsuario($convidado = false)
   {
       if ($convidado) $this->request['convidado'] = 's';

        $this->validatePeladaUsuario();

        UsuariosPelada::create($this->request->all());
   }

   private function validatePeladaUsuario()
   {
        $this->validate($this->request, [
            'idUsuario' => 'required',
            'idPelada'  => 'required',
        ]);
   }

}
