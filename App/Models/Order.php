<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Order extends Model
{

    public string $table = 'Order0504';

    protected array $fillable = [
        'order_date', 'agent_id',
    ];

}