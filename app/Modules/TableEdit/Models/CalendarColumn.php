<?php
namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class CalendarColumn extends AbstractColumn
{
    protected ?string $format = null;

    public function __construct(string $title, ?string $name = null)
    {
        parent::__construct($title, $name);
        $this->type = ColumnOptions::TYPE_CALENDAR;
        $this->align = ColumnOptions::ALIGN_CENTER;
        $this->rules = ['date'];
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
