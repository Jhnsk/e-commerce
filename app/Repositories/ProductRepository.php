<?php

    namespace App\Repositories;

    use App\Models\Product;

    class ProductRepository
    {
        public function getAll()
        {
            return Product::all();
        }

        public function getProductsByCategories(int $categoryId)
        {
            return Product::where('category_id', $categoryId)->get();
        }
    }