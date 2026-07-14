<?php

namespace App\Repositories;

use App\Models\Product;

class CartRepository
{
    public function productById(int $productId): Product
    {
        return Product::findOrFail($productId);
    }
}