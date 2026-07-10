<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'delivery_method',
        'payment_method',
        'address',
        'reference',
        'note',
        'total',
        'status'
    ];

    public function items()
    {
        return $this->hasMany(
            OrderItem::class
        );
    }
}
