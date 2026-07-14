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
        'delivery_type',
        'payment_method',
        'address',
        'reference',
        'note',
        'total'
    ];

    public function items()
    {
        return $this->hasMany(
            OrderItem::class
        );
    }
}
