<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Payment extends Model
{

    public string $table = 'Payment0504';

    protected array $fillable = [
        'total', 'status', 'transaction_code', 'bank_code', 'order_id', 'pay_date',
    ];

}