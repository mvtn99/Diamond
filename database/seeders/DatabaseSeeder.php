<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Admin;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ProductCategoriesTableSeeder::class,
            ProductSubcategorySeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
            CouponTableSeeder::class
        ]);
    }
}
