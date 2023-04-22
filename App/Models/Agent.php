<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Agent extends Model
{

    public string $table = 'Agent0504';

    protected array $fillable = [
        'name', 'address',
    ];

}