<?php

use Gloudemans\Shoppingcart\Facades\Cart;

function priceFormat($price)
{
    return number_format((float)$price, 2, '.', '');
}

function getTotals()
{
    $discount = session()->get('coupon')['discount'] ?? 0;
    $code = session()->get('coupon')['name'] ?? null;
    $newSubtotal = (Cart::subtotal() - $discount);
    if ($newSubtotal < 0) {
        $newSubtotal = 0;
    }
    $tax = $newSubtotal * (config('cart.tax') / 100);
    $newTotal = $newSubtotal + $tax;

    return collect([
        'discount' => $discount,
        'code' => $code,
        'subtotal' => $newSubtotal,
        'tax' => $tax,
        'total' => $newTotal,
    ]);
}
