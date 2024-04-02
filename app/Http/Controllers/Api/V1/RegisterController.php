<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Authentication\RegisterStoreRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public $response = [
        'status_code' => 500,
        'message' => 'Oops Something went wrong!'
    ];

    public function store(RegisterStoreRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();
            $data['password'] = Hash::make('password');
            $user = User::create($data);

            if ($user) {
                $this->response['status_code'] = 200;
                $this->response['message'] = 'User has been created!';
            }
        } catch (\Exception $err) {
            \Log::error('Error: Registering User. ' . $err);
        }

        return response()->json([
            ...$this->response
        ]);
    }
}
