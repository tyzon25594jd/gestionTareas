<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function __construct(
        private AuthService $service
    ) {}

    public function register(RegisterRequest $request)
    {
        $resultado = $this->service->register($request->validated());

        return response()->json([
            'usuario' => new UserResource($resultado['usuario']),
            'token'   => $resultado['token'],
            'tipo'    => 'Bearer',
        ], 201);
    }

    public function login(LoginRequest $request)
    {
        $resultado = $this->service->login($request->validated());

        if (!$resultado) {
            return response()->json(['mensaje' => 'Credenciales incorrectas'], 401);
        }

        return response()->json([
            'usuario' => new UserResource($resultado['usuario']),
            'token'   => $resultado['token'],
            'tipo'    => 'Bearer',
        ]);
    }

    public function logout()
    {
        $this->service->logout();
        return response()->json(['mensaje' => 'Sesión cerrada']);
    }

    public function me()
    {
        return new UserResource(auth('api')->user());
    }
}