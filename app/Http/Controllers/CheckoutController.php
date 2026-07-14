<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Services\CheckoutService;

class CheckoutController extends Controller
{
    public function __construct(private CheckoutService $checkoutService)
    {
    }

    public function checkout(CheckoutRequest $request)
    {
        $result = $this->checkoutService->process($request->only([
            'name',
            'phone',
            'delivery_type',
            'address',
            'reference',
            'payment_method',
            'note'
        ]));

        return redirect()->back();
    }
}
