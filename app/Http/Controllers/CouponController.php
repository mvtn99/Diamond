<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use App\Jobs\UpdateCoupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();

        if (!$request->cart) {
            flash('Cart is empty', 'danger');
            return back();
        }

        if (!$coupon) {
            flash('Invalid coupon', 'danger');
            return back();
        }

        UpdateCoupon::dispatchSync($coupon);

        flash('Coupon has been applied!', 'success');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        session()->forget('coupon');

        flash('Coupon has been removed.', 'success');
        return back();
    }
}
