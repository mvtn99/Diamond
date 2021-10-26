<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $numbers = getTotals()->all();
        return view('cart', ['cart' => $cart, 'numbers' => $numbers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Product $product, Request $request)
    {
        if ($request->has('quantity')) {
            Cart::add($product, $request->quantity);
        } else {
            Cart::add($product, 1);
        }
        flash('Item was added to your cart!', 'success');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Cart::get($id);

        if ($request->type == 'decrement') {
            Cart::update($id, --$item->qty);
            flash('Quantity was updated successfully!', 'success');
            return response()->json(['success' => true]);
        }

        if ($request->type == 'increment') {
            if ($item->qty > $request->productQuantity) {
                flash('We currently do not have enough items in stock', 'danger');
                return response()->json(['success' => false], 400);
            }
            Cart::update($id, ++$item->qty);
            flash('Quantity was updated successfully!', 'success');
            return response()->json(['success' => true]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        Cart::remove($rowId);
        flash('Item has been removed!', 'success');
        return redirect()->route('cart.index');
    }
}
