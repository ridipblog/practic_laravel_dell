<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'razorpay_order_id',
        'user_id',
        'amount',
        'currency',
        'status',
        'receipt'
    ];

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}