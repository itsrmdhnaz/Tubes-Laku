<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $primaryKey = 'address_id';
    public $incrementing = false;
    protected $fillable = [
        'address_id',
        'user_id',
        'address',
        'phone',
        'is_default',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    // Relasi dengan model Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'address_id', 'address_id');
    }
}
