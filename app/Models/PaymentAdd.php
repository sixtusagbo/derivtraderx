<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentAdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'coin_address',
        'coin_name',
        'symbole',
        'network',
        'exchange_platform',
    ];

    public function userPayments()
    {
        return $this->hasMany(UserPayments::class);
    }
}
