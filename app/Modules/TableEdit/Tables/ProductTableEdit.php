<?php

namespace App\Modules\TableEdit\Tables;

use App\Models\Product;
use App\Modules\TableEdit\AbstractTable;
use App\Modules\TableEdit\Models\CheckboxColumn;
use App\Modules\TableEdit\Models\Column;
use App\Modules\TableEdit\Models\DropdownColumn;
use App\Modules\TableEdit\Models\NumericColumn;
use App\Modules\TableEdit\Models\TextColumn;

class ProductTableEdit extends AbstractTable
{
    public function tableName(): string
    {
        return 'product';
    }

    public function keyColumn(): string
    {
        return 'product_id';
    }

    public function columns(): array
    {
        return [
            Column::make('id')
                ->width('0'),

            TextColumn::make('name', 'Nom'),

            NumericColumn::make('inter', 'Interval')
                ->width('70')
                ->rules(['integer', 'min:1', 'max:1000']),

            NumericColumn::make('stock', 'Stock'),

            CheckboxColumn::make('limited', 'Limité'),

            DropdownColumn::make('unit', 'Unité')
                ->sourceFromArray([
                    'BUNCH' => 'Gramme',
                    'KG' => 'KG',
                    'LITER' => 'Litre',
                    'PIECE' => 'Prix',
                ]),

            TextColumn::make('image', 'Img')
                ->visible(false),

            NumericColumn::make('price', 'Prix')
                ->editable(true),
        ];
    }

    public function data(): array
    {
        return Product::query()->select([
            'id',
            'name',
            'price',
            'stock',
            'image',
            'inter',
            'unit',
            'limited',
        ])->get()->toArray();
    }
}
