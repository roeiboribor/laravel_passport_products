<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\LoginStoreRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $response = [
        'status_code' => 500,
        'message' => 'Oops Something went wrong!'
    ];

    public function store(LoginStoreRequest $request): JsonResponse
    {
        $data = $request->validated();

        if (auth()->attempt($data)) {
            $this->response['status_code'] = 200; // Unauthorized
            $this->response['message'] = 'You have successfully login!';
            // $this->response['token'] = auth()->user()->createToken('authenticated')->accessToken;
            $this->response['token'] = auth()->user()->createToken('authenticated')->accessToken;
        } else {
            $this->response['status_code'] = 401; // Unauthorized
            $this->response['message'] = 'Invalid credentials';
        }

        return response()->json([
            ...$this->response
        ]);
    }
}
