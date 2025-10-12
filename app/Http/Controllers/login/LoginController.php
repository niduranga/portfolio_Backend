<?php

namespace App\Http\Controllers\login;

use App\Action\login\Login;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(Request $request, Login $login): JsonResponse
    {
        $requestData = $request->all();
        return response()->json($login($requestData));
    }
}
