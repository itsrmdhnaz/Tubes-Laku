<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'order_id';
    public $incrementing = false;
    protected $fillable = [
        'order_id',
        'message_order',
        'total_price',
        'address_id',
        'user_id',
        'status',
        'order_method',
        'courier_id',
        'is_read'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'pickup_date' => 'datetime',
        'process_date' => 'datetime',
        'delivery_date' => 'datetime',
        'received_date' => 'datetime',
    ];

    // Relasi dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'user_id');
    }


    // Relasi dengan model Address
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id', 'address_id');
    }

    // Relasi dengan model OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'order_id');
    }
}
