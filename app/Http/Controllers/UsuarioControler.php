<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use App\Service\UsuarioService;
use Illuminate\Http\Request;

class UsuarioControler extends Controller


{
    protected $usuarioService;



    public function  __construct(UsuarioService $novoUsuarioService)


    {

        $this->usuarioService = $novoUsuarioService;
    }

    public function store(Request $request)
    {
        $user = $this->usuarioService->create($request->all());

        return $user;
    }


    public function findById($id)
    {
        $result = $this->usuarioService->findById($id);
        return response()->json($result); 
    }

    public function index(){
        $result = $this->usuarioService->getAll();
        return response()->json($result);
    }


    public function searchByEmail(Request $request){
        $result = $this->usuarioService->searchByEmail($request->email);
        return response()->json($result);

    }



    public function delete($id){
        $result = $this->usuarioService->delete($id);
        $usuario = Usuarios::find($id);
        if($usuario == null){
            return [
                'status' => false,
                'message' => 'Usuário não encontrado'
            ];
        } 
        $usuario->delete();
        return [ 
            'status' => true,
            'message' => 'Usuário excluido com sucesso'
        ];





    }



    public function update(Request $request){
        $result = $this->usuarioService->update($request->all());
        return response()->json($result);

    }


};
