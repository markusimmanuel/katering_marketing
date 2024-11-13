<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Relasi one-to-one dengan Merchant (jika user adalah merchant)
    public function merchant()
    {
        return $this->hasOne(Merchant::class);
    }

    // Relasi one-to-many dengan Order (jika user adalah customer)
    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
