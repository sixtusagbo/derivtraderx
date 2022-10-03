<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name',
        'min_deposite',
        'max_deposite',
        'payment_period',
    ];

    public function userPayments()
    {
        return $this->hasMany(UserPayments::class);
    }
}
