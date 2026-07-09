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
    $cart = $this->cartService->getCartIncreased($id);

    if (isset($cart['error'])) {
        return response()->json([
            'error' => $cart['message']
        ], 404);
    }

    $total = $this->cartService->getTotal($cart);

    return response()->json([
        'quantity' => $cart[$id]['quantity'],
        'price' => $cart[$id]['price'],
        'total' => $total
    ]);
}

    public function decrease($id)
{
    $result = $this->cartService->getCartDecreased($id);

    if (isset($result['error'])) {
        return response()->json([
            'error' => $result['message']
        ], 404);
    }

    return response()->json($result);
}
}
