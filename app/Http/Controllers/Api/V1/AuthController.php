<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register()
    {
        return response()->json([
            'message' => 'something'
        ]);
    }

    public function login()
    {
    }
}
