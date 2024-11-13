<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'merchant_id',
        'delivery_date',
        'quantity',
        'total_price',
        'status',
    ];

    // Relasi many-to-one dengan User (customer)
    public function customer()
    {
        return $this->belongsTo(User::class, 'customer_id');
    }

    // Relasi many-to-one dengan Merchant
    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }

    // Relasi one-to-one dengan Invoice
    public function invoice()
    {
        return $this->hasOne(Invoice::class);
    }
}
