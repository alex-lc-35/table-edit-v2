<?php

namespace App\Modules\TableEdit;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TableEditController extends Controller
{
    public function show($className): JsonResponse
    {
        $classPath = "App\\Modules\\TableEdit\\Tables\\$className";

        if (class_exists($classPath)) {
            /** @var AbstractTable $table */
            $tableEdit = new $classPath();
        } else {
            return response()->json([
                'success' => false,
                'status' => 'Bad Request',
                'message' => "Le tableau $className n'est pas paramétré ",
            ]);
        }

        $data = $tableEdit->render();
        return response()->json($data);
    }

    public function edit($className, Request $request): JsonResponse
    {
        $classPath = "App\\Modules\\TableEdit\\Tables\\$className";

        if (class_exists($classPath)) {
            /** @var AbstractTable $table */
            $tableEdit = new $classPath();
        } else {
            return response()->json([
                'success' => false,
                'status' => 'Bad Request',
                'message' => "Le tableau $className n'est pas paramétré ",
            ]);
        }

        $data = $tableEdit->edit($request);
        return response()->json($data);
    }
}
