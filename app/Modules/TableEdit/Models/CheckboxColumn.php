<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class CheckboxColumn extends AbstractColumn
{
    public function __construct(string $title, ?string $name = null)
    {
        parent::__construct($title, $name);
        $this->type = ColumnOptions::TYPE_CHECKBOX;
        $this->align = ColumnOptions::ALIGN_CENTER;
        $this->rules = ['boolean'];
    }
}
