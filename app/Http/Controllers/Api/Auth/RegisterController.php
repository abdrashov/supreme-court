<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\UserService;
use Tymon\JWTAuth\Facades\JWTAuth;

class RegisterController extends Controller
{
    public function store(RegisterRequest $request)
    {
        $user = UserService::store(...$request->all('name', 'email', 'password'));

        $token = JWTAuth::fromUser($user);

        return response()->json([
            'message' => 'User successfully registered',
            'user' => $user,
            'token' => $token,
        ], 201);
    }
}
