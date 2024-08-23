<?php

namespace App\Service;

use App\Models\Usuarios;

class UsuarioService
{
    public function create(array $dados){
        $user = Usuarios::create([
            'nome' =>$dados['nome'],
            'email'=>$dados['email'],
            'password'=>$dados['password']
        ]);

        return $user;
    }



    public function update()
    {
    }

    public function delete()
    {
    }


    public function findByID()
    {
    }



    public function getAll()
    {
    }

    public function searchByName()
    {
    }
}
