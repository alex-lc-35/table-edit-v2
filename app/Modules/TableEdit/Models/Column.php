<?php

namespace App\Modules\TableEdit\Models;

use App\Modules\TableEdit\Enums\ColumnOptions;

class Column
{
    protected string $title;
    protected string $name;
    protected bool $visible = true;
    protected string $width = '100px';
    protected string $align = ColumnOptions::ALIGN_LEFT;
    protected string $type = ColumnOptions::TYPE_TEXT;
    protected bool $editable = true;

    protected ?array $source = null;
    protected ?string $format = null;


    public function __construct(string $title, ?string $name = null)
    {
        $this->title = $title;
        $this->name = $name ?? $this->slugify($title);
    }

    public static function make(string $title, ?string $name = null): self
    {
        return new self($title, $name);
    }

    public function width(int|string $width): self
    {
        $this->width = is_numeric($width) ? "{$width}px" : $width;
        return $this;
    }

    public function align(string $align): self
    {
        $this->align = $align;
        return $this;
    }

    public function type(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function source(array $values): self
    {
        $this->source = $values;
        return $this;
    }

    public function format(string $format): self
    {
        $this->format = $format;
        return $this;
    }

    public function name(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function editable(bool $value): self
    {
        $this->editable = $value;
        return $this;
    }

    public function visible(bool $value): self
    {
        $this->type = $value === false ? 'hidden' : $this->type;
        return $this;
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
            'source' => $this->source,
            'format' => $this->format,
        ];
    }

    protected function slugify(string $text): string
    {
        return strtolower(preg_replace('/[^a-z0-9]+/', '_', $text));
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEditable(): bool
    {
        return $this->editable;
    }
}
