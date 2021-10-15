<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $man_item = Product::where('category_id', 1)->orderBy('created_at', 'desc')->take(9)->get();
        $woman_item = Product::where('category_id', 2)->orderBy('created_at', 'desc')->take(9)->get();
        $kids_item = Product::where('category_id', 3)->orderBy('created_at', 'desc')->take(9)->get();
        $accessory_item = Product::where('category_id', 4)->orderBy('created_at', 'desc')->take(9)->get();
        $perfume_item = Product::where('category_id', 5)->orderBy('created_at', 'desc')->take(9)->get();
        return view('home', ['man_item' => $man_item, 'woman_item' => $woman_item, 'kids_item' => $kids_item, 'accessory_item' => $accessory_item, 'perfume_item' => $perfume_item, 'posts' => $posts]);
    }
}
