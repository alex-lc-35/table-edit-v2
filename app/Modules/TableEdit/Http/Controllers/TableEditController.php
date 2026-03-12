<?php

namespace App\Modules\TableEdit\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\TableEdit\AbstractTable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TableEditController extends Controller
{
    public function show(AbstractTable $tableEditClass): JsonResponse
    {
        $data = $tableEditClass->render();
        return response()->json($data);
    }

    public function edit(AbstractTable $tableEditClass, Request $request): JsonResponse
    {
        $data = $tableEditClass->edit($request);
        return response()->json($data);
    }
}
