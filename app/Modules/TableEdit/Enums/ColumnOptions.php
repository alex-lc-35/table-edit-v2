<?php

namespace App\Modules\TableEdit\Enums;

class ColumnOptions
{
    // Types de colonnes Jspreadsheet
    public const TYPE_TEXT = 'text';
    public const TYPE_NUMERIC = 'numeric';
    public const TYPE_DROPDOWN = 'dropdown';
    public const TYPE_CALENDAR = 'calendar';
    public const TYPE_CHECKBOX = 'checkbox';
    public const TYPE_COLOR = 'color';
    public const TYPE_HTML = 'html';

    // Alignements
    public const ALIGN_LEFT = 'left';
    public const ALIGN_CENTER = 'center';
    public const ALIGN_RIGHT = 'right';

    // Formats utiles
    public const FORMAT_DATE_FR = 'DD/MM/YYYY';
    public const FORMAT_DATE_EN = 'YYYY-MM-DD';
}
