<?php

namespace App\Service;

use App\Models\Usuarios;

class UsuarioService
{
    public function create(array $dados)
    {
        $user = Usuarios::create([
            'nome' => $dados['nome'],
            'email' => $dados['email'],
            'password' => $dados['password']
        ]);

        return $user;
    }

    

    // função uptade 
    public function update(array $dados)
    {
        $usuario = Usuarios::find($dados['id']);
        if ($usuario == null) {
            return [
                'status' => false,
                'message' => 'Usuário não encontrado'
            ];
        }
        if (isset($dados['password'])) {
            $usuario->password = $dados['password'];
        }

        if (isset($dados['nome'])) {
            $usuario->nome =  $dados['nome'];
        }

        if (isset($dados['email'])) {
            $usuario->email = $dados['email'];
        }

        $usuario->save();

        return [
            'status' => true,
            'message' => 'Atualizado com sucesso'
        ];
    }



    public function delete()
    {
    }


    public function findById($id)
    {
        $usuario = Usuarios::find($id);
        if ($usuario == null) {
            return ['message' => 'Usuário não encontrado'];
        }
        return [
            'status' => true,
            'message' => 'Usuário Encontrado',
            'data' => $usuario
        ];
    }



    public function getAll()
    {

        $usuarios = Usuarios::all();
        return [
            'status' => true,
            'message' => 'Pesquisa executada com sucesso',
            'data' => $usuarios
        ];
    }

    public function searchByName($nome)
    {
        $usuarios = Usuarios::where('nome', 'like', '%' . $nome . '%')->get();
        if ($usuarios->isEmpty()) {
            return [
                'status' => false,
                'massage' => 'Resultados Encontrados',
                'data' => $usuarios
            ];
        }
    }



    public function searchByEmail($email)
    {
        $usuarios = Usuarios::where('email', 'like', '%' . $email . '%')->get();
        if ($usuarios->isEmpty()) {
            return [
                'status' => false,
                'massage' => 'Resultados não encontrados',

            ];
        }
        return $usuarios;
    }
}
