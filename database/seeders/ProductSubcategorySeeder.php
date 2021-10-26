<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductSubcategory;

class ProductSubcategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductSubcategory::insert([
            [
                'name' => 't-shirts'
            ],
            [
                'name' => 'jacket'
            ],
            [
                'name' => 'Jeans'
            ],
            [
                'name' => 'sweatshirts'
            ],
            [
                'name' => 'trousers'
            ]
        ]);
    }
}
