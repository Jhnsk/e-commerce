<?php

    namespace App\Services;

    use App\Repositories\OrderRepositories;
    use App\Services\CartService;

    class CheckoutService 
    {
        public function __construct(

            private OrderRepository $orderRepository,
            private CartService $cartService

            ){}

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
        }
    }