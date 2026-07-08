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

            if (isset($cart[$product->id])) {

                $cart[$product->id]['quantity']++;
            
            } else {
            
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
        
        public function calcularTotal()
        {
            $cart = session()->get('cart', []);

            $total = 0;

            foreach($cart as $item){
                $total += $item['price'] * $item['quantity'];
            }

            return $total;
        }
    }