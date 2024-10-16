<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function register(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);

        $tokenResult = $user->createToken('MyApp');
        $token = $tokenResult->accessToken;
        $expiration = $tokenResult->token->expires_at;

        $formattedExpiration = $expiration->diff(now())->format('%H:%I:%S');

        $success['token'] = $token;
        $success['expires_in'] = $formattedExpiration;
        $success['name'] = $user->name;
        return $this->sendResponse($success, 'User register successfully.');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $tokenResult = $user->createToken('MyApp');
            $token = $tokenResult->accessToken;
            $expiration = $tokenResult->token->expires_at;

            $formattedExpiration = $expiration->diff(now())->format('%H:%I:%S');

            $success['token'] = $token;
            $success['expires_in'] = $formattedExpiration;
            $success['name'] = $user->name;
            return $this->sendResponse($success, 'User login successfully.');
        } else {
            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }
}
