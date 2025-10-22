<?php

namespace App\Http\Controllers\register;

use App\Action\register\Register;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request, Register $register): JsonResponse
    {
        $requestData = $request->all();
        return response()->json($register($requestData));
    }
}
