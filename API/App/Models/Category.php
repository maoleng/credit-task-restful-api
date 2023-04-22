<?php

namespace App\Models;

use Libraries\database_drivers\Model;

class Category extends Model
{

    public string $table = 'Category0504';

    protected array $fillable = [
        'name', 'description',
    ];

}