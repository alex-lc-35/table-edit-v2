<?php

namespace App\Modules\TableEdit;

class TableEdit
{
    public static function resolve(string $name): AbstractTable
    {
        return TableRegistry::resolve($name);
    }

    public static function make(string $name): TableEditService
    {
        $table = static::resolve($name);

        $service = new TableEditService($table->tableName());
        $service->setColumns($table->columns());
        $service->setData($table->data());

        return $service;
    }
}
