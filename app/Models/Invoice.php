<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'invoice_number',
        'invoice_date',
        'amount',
    ];

    // Relasi one-to-one dengan Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
