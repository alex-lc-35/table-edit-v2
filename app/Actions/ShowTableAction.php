<?php

namespace App\Actions;

use App\Modules\TableEdit\AbstractTable;
use Throwable;

class ShowTableAction
{
    public function execute(AbstractTable $tableEditClass) : ActionResult
    {
        try {
            $data = $tableEditClass->render();
            return ActionResult::success($data);
        } catch (Throwable $e) {
            report($e);
            return ActionResult::error($e->getMessage(), $e->getCode());
        }
    }
}
