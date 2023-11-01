<?php

namespace App\Http\Controllers\Api\Auth;

use App\Exceptions\Unauthorized;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function store(LoginRequest $request)
    {
        $user = UserService::getByNameEmail(...$request->all('name_email'));

        if (!$user
            || !Hash::check($request->password, $user->password)
            || !$token = Auth::login($user)
        ) {
            throw Unauthorized::message();
        }

        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => config('jwt.ttl')
        ]);
    }
}
