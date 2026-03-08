<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class TextColumn extends AbstractColumn
{
    public function __construct(string $title, ?string $name = null)
    {
        parent::__construct($title, $name);
        $this->width = '200';
        $this->type = ColumnOptions::TYPE_TEXT;
        $this->align = ColumnOptions::ALIGN_LEFT;
        $this->rules = ['string'];
    }
}
