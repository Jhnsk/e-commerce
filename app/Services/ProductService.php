<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService
{
    public function __construct(private ProductRepository $productRepository)
    {
    }

    public function getAllProducts()
    {
        return $this->productRepository->getAll();
    }

    public function getProductsCount()
    {
        return $this->productRepository->getProductsCount();
    }

    public function getProductsByCategories(int $categoryId)
    {
        return $this->productRepository->getProductsByCategories($categoryId);
    }

    public function searchProduts(string $search)
    {
        return $this->productRepository->searchProduts($search);
    }

    public function addProduct(array $data, $image)
    {
        if ($image) {
            $path = $image->store('products', 'public');

            $data['image'] = $path;
        }

        return $this->productRepository->createProduct($data);
    }

}