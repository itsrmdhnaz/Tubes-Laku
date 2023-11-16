<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use \Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $primaryKey = 'user_id';

    protected $primaryKey = 'user_id';
    public $incrementing = false;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'email_verified_at',
        'role',
        'password',
        'gender',
        'avatar',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
    *@param string $value
    *@return \Illuminate\Database\Eloquent\Casts\Attribute
    */
    protected function role() : Attribute
    {
        return new Attribute(
            get: fn ($value) => ["user","admin","kurir"][$value]
        );
    }

    // Relasi dengan model Address
    public function addresses()
    {
        return $this->hasMany(Address::class, 'user_id', 'user_id');
    }

    // Relasi dengan model Order
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'user_id');
    }

    public function courierOrders()
{
    return $this->hasMany(Order::class, 'courier_id', 'user_id');
}

public function ordersTaken()
{
    return $this->hasMany(Order::class, 'courier_id')->whereIn('status', [1, 2, 3]);
}

}
