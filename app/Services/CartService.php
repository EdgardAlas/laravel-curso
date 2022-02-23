<?php

namespace App\Services;

use App\Models\Cart;
use Illuminate\Support\Facades\Cookie;

class CartService
{

    public function getFromCookie()
    {
        $cartId = Cookie::get("cart");
        // $cart = Cart::with("products")->where("carts.id", $cartId)->first();
        $cart = Cart::find($cartId);
        return $cart;
    }

    public function getFromCookieOrCreate()
    {
        $cart = $this->getFromCookie();
        return $cart ?? Cart::create();
    }

    public function makeCookie($cart)
    {
        return cookie()->make("cart", $cart->id, 7 * 24 * 60);
    }

    public function countProducts()
    {
        $cart = $this->getFromCookie();
        if ($cart != null) {
            return $cart->products->pluck("pivot.quantity")->sum();
        }
        return 0;
    }
}
