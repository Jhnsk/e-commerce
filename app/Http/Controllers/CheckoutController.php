<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{
    public function __construct(private CheckoutService $checkoutService){}

    public function checkout(Request $request)
    {
        $data = $request->validate([

            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'delivery_type' => 'required|in:delivery,pickup',
            'address' => 'nullable|string|max:255',
            'reference' => 'nullable|string|max:255',
            'payment_method' => 'required|string',
            'note' => 'nullable|string',
            
        ]);

        $result = $this->checkoutService->process($data);

        return redirect()->back();
    }
}
