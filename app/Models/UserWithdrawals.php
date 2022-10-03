<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawals extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'withdrawal_add_id',
        'amount',
        'status',
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function withdrawalAdd()
    {
        return $this->belongsTo(WithdrawalAdd::class);
    }
}
