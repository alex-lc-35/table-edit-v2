<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected function casts()
    {
        return [
            'is_displayed' => 'boolean',
            'has_stock' => 'boolean',
            'limited' => 'boolean',
            'discount' => 'boolean',
            'is_deleted' => 'boolean',
        ];
    }
}
