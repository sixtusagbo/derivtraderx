<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'paymentAdd_id',
        'amount',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentAdd()
    {
        return $this->belongsTo(PaymentAdd::class, 'paymentAdd_id');
        
    }

    public function plans()
    {
        return $this->belongsTo(Plans::class);
    }
}
