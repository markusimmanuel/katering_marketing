<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'address',
        'contact_number',
        'description',
    ];

    // Relasi one-to-one dengan User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi one-to-many dengan Menu
    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    // Relasi one-to-many dengan Order
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
