<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAll()
    {
        return Product::paginate(8);
    }

    public function getProductsCount()
    {
        return Product::count();
    }

    public function getProductsByCategories(int $categoryId)
    {
        return Product::where('category_id', $categoryId)->paginate(8);
    }

    public function searchProduts(string $search)
    {
        return Product::where('name', 'like', "%{$search}%")->paginate(8);
    }

    public function createProduct($data)
    {
        return Product::create($data);
    }

    public function update(Product $product, array $data): bool
    {
        return $product->update($data);
    }

    public function destroyProduct(int $id)
    {
        return Product::destroy($id);
    }
}