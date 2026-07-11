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
 
            }
                    session()->put('cart', $cart);
        } 

        public function getCartIncreased(int $id): array
        {
            $cart = session('cart', []);

            if (!isset($cart[$id])) {
                return [
                    'error' => true,
                    'message' => 'Produto não encontrado no carrinho'
                ];
            }

            $cart[$id]['quantity']++;

            session(['cart' => $cart]);

            return $cart;
        }

        public function getCartDecreased(int $id)
        {
            $cart = session('cart', []);

        
            if (!isset($cart[$id])) {
                return [
                    'error' => 'true',
                    'message' => 'Produto não encontrado no carrinho'

                ];
            }
    
    
                $cart[$id]['quantity']--;
    
                if ($cart[$id]['quantity'] <= 0) {
                    unset($cart[$id]);
    
                     
    
                    session(['cart' => $cart]);
    
                    return [
                        'removed' => true,
                        'total' => $this->getTotal($cart)
                    ];
                }
            
    
            session(['cart' => $cart]);
            
            return [
                'removed' => false,
                'quantity' => $cart[$id]['quantity'],
                'price' => $cart[$id]['price'],
                'total' => $this->getTotal($cart)
            ];
        }

        public function getTotal($cart)
        {
            $total = 0;

            foreach($cart as $cartItem){
                $total += $cartItem['price'] * $cartItem['quantity'];
            }

            return $total;

        }
        
    }