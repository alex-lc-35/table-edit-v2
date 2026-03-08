<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

abstract class AbstractColumn
{
    protected string $title;
    protected string $name;
    protected bool $visible = true;
    protected string $width = '100px';
    protected string $align = ColumnOptions::ALIGN_LEFT;
    protected string $type;
    protected bool $editable = true;
    protected array $rules = [];

    public function __construct(string $name, ?string $title = null)
    {
        $this->name = $name;
        $this->title = $title ?? $this->slugify($name);
    }

    public static function make(string $title, ?string $name = null): static
    {
        return new static($title, $name);
    }

    public function width(int|string $width): static
    {
        $this->width = is_numeric($width) ? "{$width}px" : $width;
        return $this;
    }

    public function align(string $align): static
    {
        $this->align = $align;
        return $this;
    }

    public function editable(bool $value): static
    {
        $this->editable = $value;
        return $this;
    }

    public function visible(bool $value): self
    {
        $this->type = $value === false ? 'hidden' : $this->type;
        return $this;
    }

    public function name(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function rules(array $rules): static
    {
        $this->rules = $rules;
        return $this;
    }

    public function getRules(): array
    {
        return $this->rules;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEditable(): bool
    {
        return $this->editable;
    }

    public function toArray(): array
    {
        return [
            'title' => $this->title,
            'name' => $this->name,
            'width' => $this->width,
            'align' => $this->align,
            'type' => $this->type,
            'editable' => $this->editable,
            'visible' => $this->visible,
            'rules' => $this->rules,
        ];
    }

    protected function slugify(string $text): string
    {
        return strtolower(preg_replace('/[^a-z0-9]+/', '_', $text));
    }
}
