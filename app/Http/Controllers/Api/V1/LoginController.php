<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public $response = [
        'status_code' => 500,
        'message' => 'Oops Something went wrong!'
    ];

    public function store()
    {
        return response()->json([
            ...$this->response
        ]);
    }
}
