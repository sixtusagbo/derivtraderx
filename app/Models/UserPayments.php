<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPayments extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_add_id',
        'amount',
        //? 0 - Pending, 1 - Approved(i.e running), 2 - Completed
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function paymentAdd()
    {
        return $this->belongsTo(PaymentAdd::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
