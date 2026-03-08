<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class DropdownColumn extends AbstractColumn
{
    protected array $source = [];

    public function __construct(string $title, ?string $name = null)
    {
        parent::__construct($title, $name);
        $this->type = ColumnOptions::TYPE_DROPDOWN;
        $this->rules = []; // sera défini via source/sourceFromArray
    }

    public function source(array $source): static
    {
        $this->source = $source;

        // Si aucune règle définie manuellement, on génère la règle "in:"
        if (empty($this->rules)) {
            $this->rules = ['in:' . implode(',', array_keys($source))];
        }

        return $this;
    }

    public function sourceFromArray(array $source): static
    {
        $newSource = [];

        foreach ($source as $key => $value) {
            $newSource[] = (object) [
                'id' => $key,
                'name' => $value,
            ];
        }

        $this->source = $newSource;

        // Si aucune règle définie manuellement, on génère la règle "in:"
        if (empty($this->rules)) {
            $ids = array_map(fn($item) => $item->id, $newSource);
            $this->rules = ['in:' . implode(',', $ids)];
        }

        return $this;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'source' => $this->source,
        ]);
    }
}
