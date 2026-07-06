<?php

    namespace App\Repositories;

    use App\Models\Product;

    class CartRepository
    {
        public function productById(int $productId)
        {
           return  Product::findOrFail($productId);
        }
    }