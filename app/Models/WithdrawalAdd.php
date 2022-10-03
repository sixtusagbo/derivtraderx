<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WithdrawalAdd extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'Coin_Address',
        'Coin_name',
        'Symbol',
        'Network',
        'Exchange_platform',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userWithdrawals()
    {
        return $this->hasMany(UserWithdrawals::class);
    }
}
