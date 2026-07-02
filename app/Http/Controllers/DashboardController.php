<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;

class DashboardController extends Controller
{
    public function __construct(private ProductService $productService){}

    public function dashboard()
    {
        $products = $this->productService->getAllProducts();

        return view('dashboard', compact('products'));
    }

    
}
