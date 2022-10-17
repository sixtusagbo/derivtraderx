<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'min_deposit',
        'max_deposit',
        'payment_period',
    ];

    public function userPayments()
    {
        return $this->hasMany(UserPayments::class);
    }
}
