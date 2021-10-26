<?php

namespace Database\Seeders;

use App\Models\Coupon;
use Illuminate\Database\Seeder;

class CouponTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Coupon::insert([
            [
                'code'           => 'code000',
                'value'          => '40',
            ],
            [
                'code'           => 'code111',
                'value'          => '20',
            ]
        ]);
    }
}
