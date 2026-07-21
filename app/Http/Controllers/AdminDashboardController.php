<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Repositories\CategoryRepository;

class AdminDashboardController extends Controller
{
    public function __construct(

        private ProductService $product_service,
        private OrderRepository $order_repository,
        private UserRepository $user_repository,
        private CategoryRepository $category_repository
    ) {
    }
    public function index()
    {
        $productsCount = $this->product_service->getProductsCount();
        $ordersCount = $this->order_repository->getOrdersCount();
        $ordersTotal = $this->order_repository->getTotalRevenue();
        $lastOrders = $this->order_repository->getLastOrders();
        $clientes = $this->user_repository->getClientesCount();
        $products = $this->product_service->getAllProducts();
        $categorys = $this->category_repository->getAll();

        return view("adminDashboard", compact(
            "productsCount",
            "ordersCount",
            "clientes",
            "ordersTotal",
            "products",
            "lastOrders",
            "categorys"
        ));
    }

    public function addProduct(ProductRequest $request)
    {
        $data = $request->validated();
    
        $this->product_service->addProduct(
            $data,
            $request->file('image')
        );
    
        return back()->with('success', 'Produto cadastrado com sucesso!');
    }
}
