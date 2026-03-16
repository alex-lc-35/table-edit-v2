<?php

namespace App\Modules\TableEdit\Http\Controllers;

use App\Actions\ShowTableAction;
use App\Http\Controllers\Controller;
use App\Modules\TableEdit\AbstractTable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TableEditController extends Controller
{
    public function show(AbstractTable $tableEditClass, ShowTableAction $action): JsonResponse
    {
        return $action->execute($tableEditClass)->jsonResponse();
    }

    public function edit(AbstractTable $tableEditClass, Request $request): JsonResponse
    {
        $data = $tableEditClass->edit($request);
        return response()->json($data);
    }
}
