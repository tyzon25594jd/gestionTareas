<?php

namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function crear(array $datos)
    {
        return User::create($datos);
    }

    public function buscarPorEmail(string $email)
    {
        return User::where('email', $email)->first();
    }
}