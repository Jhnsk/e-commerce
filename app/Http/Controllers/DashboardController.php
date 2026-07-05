<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Services\CategoryService;

class DashboardController extends Controller
{

    public function __construct(private ProductService $productService, private CategoryService $categoryService){}

    public function dashboard()
    {
        $products = $this->productService->getAllProducts();
        $categories = $this->categoryService->getAllCategories();

        return view('dashboard', compact('products','categories'));
    }

    public function byCategories(int $id)
    {
        $products = $this->productService->getProductsByCategories($id);
        $categories = $this->categoryService->getAllCategories();

        return view('dashboard', compact('products','categories'));
    }

    public function search(Request $request)
    {
        $search = trim($request->search);

        $products = $this->productService->searchProduts($search);
        $categories = $this->categoryService->getAllCategories();

        return view('dashboard', compact('products','categories'));
    }

}
