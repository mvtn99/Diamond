<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use App\Mail\OrderPlaced;
use App\Models\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Cart::instance('default')->count() == 0) {
            return redirect()->route('shop.index');
        }

        $numbers = getTotals()->all();

        return view('checkout', ['numbers' => $numbers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'postalcode' => 'required',
            'phone' => 'required',
        ]);



        // Check race condition when there are less items available to purchase
        if ($this->productsAreNoLongerAvailable()) {
            flash('Sorry! One of the items in your cart is no longer avialble.', 'danger');
            return back();
        }

        // $contents = Cart::content()->map(function ($item) {
        //     return $item->name . ', ' . $item->qty;
        // })->values()->toJson();
        // try {
        // do the payment

        $order = $this->addToOrdersTables($request, null);
        Mail::send(new OrderPlaced($order));

        // decrease the quantities of all the products in the cart
        $this->decreaseQuantities();

        Cart::instance('default')->destroy();
        session()->forget('coupon');

        return redirect()->route('confirmation');
        // } catch (\Throwable $e) {
        //     $this->addToOrdersTables($request, $e->getMessage());
        //     flash('Error!' . $e->getMessage());
        //     return back();
        // }
    }

    protected function addToOrdersTables($request, $error)
    {
        // Insert into orders table
        $order = Order::create([
            'user_id' => auth()->user()->id,
            'billing_email' => $request->email,
            'billing_name' => $request->name . ' ' . $request->lname,
            'billing_address' => $request->address,
            'billing_country' => $request->country,
            'billing_city' => $request->city,
            'billing_province' => $request->state,
            'billing_postalcode' => $request->postalcode,
            'billing_phone' => $request->phone,
            'billing_discount' => getTotals()->get('discount'),
            'billing_discount_code' => getTotals()->get('code'),
            'billing_subtotal' => getTotals()->get('subtotal'),
            'billing_tax' => getTotals()->get('tax'),
            'billing_total' => getTotals()->get('total') + 10,
            'error' => $error,
        ]);

        // Insert into order_product table
        foreach (Cart::content() as $item) {
            OrderProduct::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
            ]);
        }

        return $order;
    }

    protected function decreaseQuantities()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);

            $product->update(['stock' => $product->stock - $item->qty]);
        }
    }

    protected function productsAreNoLongerAvailable()
    {
        foreach (Cart::content() as $item) {
            $product = Product::find($item->id);
            if ($product->stock < $item->qty) {
                return true;
            }
        }

        return false;
    }
}
