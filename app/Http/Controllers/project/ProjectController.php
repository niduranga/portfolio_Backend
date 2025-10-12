<?php

namespace App\Http\Controllers\project;

use App\Action\project\AddProject;
use App\Action\project\RemoveProject;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function AddProject(Request $request, AddProject $addProject): JsonResponse
    {
        $requestData = $request->all();
        return response()->json($addProject($requestData));
    }

    public function removeProject(Request $request, RemoveProject $removeProject): JsonResponse
    {
        $requestData = $request->all();
        return response()->json($removeProject($requestData));
    }
}
