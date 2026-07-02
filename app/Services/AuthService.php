<?php

namespace App\Services;

use App\Repositories\UserRepository;

class AuthService
{
    public function __construct(
        private UserRepository $repository
    ) {}

    public function register(array $datos)
    {
        $usuario = $this->repository->crear([
            'name'     => $datos['name'],
            'email'    => $datos['email'],
            'password' => bcrypt($datos['password']),
        ]);

        $token = auth('api')->login($usuario);

        return ['usuario' => $usuario, 'token' => $token];
    }

    public function login(array $datos)
    {
        $token = auth('api')->attempt($datos);

        if (!$token) {
            return null;
        }

        return ['usuario' => auth('api')->user(), 'token' => $token];
    }

    public function logout()
    {
        auth('api')->logout();
    }
}
