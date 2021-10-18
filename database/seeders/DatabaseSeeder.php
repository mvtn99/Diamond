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
        User::factory(22)->create();
        Admin::factory(5)->create();
        Post::factory(30)->create();
        Product::factory(100)->create();
        Comment::factory(100)->create();
    }
}
