<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Sushi\Sushi;

class AccountType extends Model
{
    use HasFactory, Sushi;

    const ADMINISTRATOR = 1;
    const PRINCIPAL = 2;
    const DISTRIBUTION = 3;
    const RETAILER = 4;

    protected $rows = [
        [
            'id' => self::ADMINISTRATOR,
            'name' => 'Administrator'
        ],
        [
            'id' => self::PRINCIPAL,
            'name' => 'Principal'
        ],
        [
            'id' => self::DISTRIBUTION,
            'name' => 'Distribution'
        ],
        [
            'id' => self::RETAILER,
            'name' => 'Retailer'
        ]
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
