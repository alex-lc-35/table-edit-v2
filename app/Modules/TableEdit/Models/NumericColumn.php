<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class NumericColumn extends AbstractColumn
{
    protected ?string $format = null;

    public function __construct(string $title, ?string $name = null)
    {
        parent::__construct($title, $name);
        $this->width = '50';
        $this->type = ColumnOptions::TYPE_NUMERIC;
        $this->align = ColumnOptions::ALIGN_RIGHT;
        $this->rules = ['numeric'];
    }

    public function format(string $format): static
    {
        $this->format = $format;
        return $this;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'format' => $this->format,
        ]);
    }
}
