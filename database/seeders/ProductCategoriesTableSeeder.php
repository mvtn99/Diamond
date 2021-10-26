<?php

namespace Database\Seeders;

use App\Models\ProductCategory;
use Illuminate\Database\Seeder;

class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductCategory::insert([
            [
                'name' => 'men-item'
            ],
            [
                'name' => 'women_item'
            ],
            [
                'name' => 'kids_item'
            ],
            [
                'name' => 'accessories'
            ],
            [
                'name' => 'perfume'
            ]
        ]);
    }
}
