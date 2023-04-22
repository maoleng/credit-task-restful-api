<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class OrderDetail extends Model
{

    public string $table = 'OrderDetail0504';

    protected array $fillable = [
        'order_id', 'item_id', 'quantity', 'unit_amount',
    ];

    protected array $not_string_attributes = [
        'quantity', 'unit_amount',
    ];

}