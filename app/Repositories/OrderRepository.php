<?php

namespace App\Repositories;

use App\Models\Order;

class OrderRepository
{
    public function create(array $data): Order
    {
        return Order::create($data);
    }

    public function getOrdersCount()
    {
        return Order::count();
    }

    public function getTotalRevenue()
    {
        return Order::sum("total");
    }

    public function getLastOrders(int $limit = 3)
    {
        return Order::select('id', 'name', 'created_at')
        ->latest()
        ->take($limit)
        ->get();
    }
}