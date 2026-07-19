<?php

namespace App\Http\Controllers;

use App\Repositories\OrderRepository;
use App\Repositories\UserRepository;
use App\Services\ProductService;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function __construct(

        private ProductService $product_service,
        private OrderRepository $order_repository,
        private UserRepository $user_repository
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

        return view("adminDashboard", compact(
            "productsCount",
            "ordersCount",
            "clientes",
            "ordersTotal",
            "products",
            "lastOrders"
        ));
    }
}
