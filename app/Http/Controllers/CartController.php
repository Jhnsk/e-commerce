<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    public function __construct(private CartService $cartService){}

    public function add(Request $request)
    {
        $cart = $this->cartService->addProduct(
           (int) $request->product_id,
            $request->size,
            $request->color
        );

        return back();
    }

    public function increase($id)
    {
        $cart = session('cart', []);

        if (!isset($cart[$id])) {
            return response()->json([
                'error' => 'Produto não encontrado no carrinho'
            ], 404);
        }
        
            $cart[$id]['quantity']++;
        
        session(['cart' => $cart]);

        $total = 0;

        foreach($cart as $cartItem){
            $total += $cartItem['price'] * $cartItem['quantity'];
        }

        return response()->json([
            'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $total
        ]);
    } 

    public function decrease($id)
    {
        $cart = session('cart', []);

        
        if (!isset($cart[$id])) {
            return response()->json([
                'error' => 'Produto não encontrado no carrinho'
            ], 404);
        }


            $cart[$id]['quantity']--;

            if ($cart[$id]['quantity'] <= 0) {
                unset($cart[$id]);

                $total = 0;

            foreach($cart as $cartItem){
                $total += $cartItem['price'] * $cartItem['quantity'];
            }

                session(['cart' => $cart]);

                return response()->json([
                    'removed' => true,
                    'total' => $total
                ]);
            }
        

        session(['cart' => $cart]);

        $total = 0;

        foreach($cart as $cartItem){
            $total += $cartItem['price'] * $cartItem['quantity'];
        }

        return response()->json([
            'removed' => false,
            'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $total
        ]);
    }
}
