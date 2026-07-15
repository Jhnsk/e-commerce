<?php

namespace App\Services;

use App\Repositories\OrderItemRepository;
use App\Repositories\OrderRepository;
use App\Services\CartService;
use App\Services\WhatsappMessageService;

class CheckoutService
{
    public function __construct(

        private OrderRepository $orderRepository,
        private CartService $cartService,
        private OrderItemRepository $orderItemRepository,
        private WhatsappMessageService $whatsappMessageService

    ) {
    }

    public function process(array $data)
    {

        $cart = session()->get('cart', []);

        $total = $this->cartService->getTotal($cart);

        $order = [

            'name' => $data['name'],
            'phone' => $data['phone'],
            'delivery_type' => $data['delivery_type'],
            'address' => $data['address'],
            'reference' => $data['reference'],
            'payment_method' => $data['payment_method'],
            'note' => $data['note'],
            'total' => $total

        ];

        $orderCreated = $this->orderRepository->create($order);

        foreach ($cart as $item) {

            $this->orderItemRepository->create([

                'order_id' => $orderCreated->id,
                'product_id' => $item['product_id'],
                'product_name' => $item['name'],
                'price' => $item['price'],
                'quantity' => $item['quantity'],
                'subtotal' => $item['price'] * $item['quantity'],
                'size' => $item['size'],
                'color' => $item['color']

            ]);
        }

        $url = $this->whatsappMessageService->generate($orderCreated, $cart, $total);

        session()->forget('cart');

        return $url;

    }

}