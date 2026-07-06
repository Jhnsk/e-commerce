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
}
