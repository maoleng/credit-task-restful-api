<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Item extends Model
{

    public string $table = 'Item0504';

    protected array $fillable = [
        'name', 'size', 'price', 'category_id',
    ];

    protected array $not_string_attributes = [
        'price',
    ];

}