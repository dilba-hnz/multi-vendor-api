<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\Auth\UserResource;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected AuthService $authService
    )
    {
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->authService->register($request);

        return response()->json(UserResource::make($user));
    }

    public function login(LoginRequest $request)
    {
        $token = $this->authService->login($request);

        return response()->json([
            'token' => $token
        ]);
    }

    public function logout(Request $request)
    {
        $this->authService->logout($request);

        return response()->noContent();
    }
}
