<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $primaryKey = 'item_id';
    public $incrementing = false;
    protected $fillable = [
        'item_id',
        'name',
        'price',
        'image',
    ];

    // Relasi dengan model OrderItem
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'item_id', 'item_id');
    }
}
