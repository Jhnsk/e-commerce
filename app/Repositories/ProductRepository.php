<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::paginate(8);
    }

    public function getProductsByCategories(int $categoryId)
    {
        return Product::where('category_id', $categoryId)->paginate(8);
    }

    public function searchProduts(string $search)
    {
        return Product::where('name', 'like', "%{$search}%")->paginate(8);
    }
}