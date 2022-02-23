<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use App\Services\CartService;
use Illuminate\Http\Request;

class OrderPaymentController extends Controller
{

    public $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function create(Order $order)
    {
        return view("payments.create")->with(["order" => $order]);
    }


    public function store(Request $request, Order $order)
    {
        $this->cartService->getFromCookie()->products()->detach();
        $order->payment()->create([
            "amount" => $order->total,
            "payed_at" => now()
        ]);

        $order->status = "payed";
        $order->save();

        return redirect()->route("main")->withSuccess("Thanks {$order->total}");
    }
}
