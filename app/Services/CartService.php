<?php

    namespace App\Services;

    use App\Repositories\CartRepository;

    class CartService 
    {
        public function __construct(private CartRepository $cartRepository){}

        public function addProduct(int $productId, string $size, string $color)
        {
            $product = $this->cartRepository->productById($productId);

            $cart = session()->get('cart', []);

            $cart[$product->id] = [

                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'size' => $size,
                'color' => $color,
                'quantity' => 1
            ];

            session()->put('cart', $cart);
        }
    }