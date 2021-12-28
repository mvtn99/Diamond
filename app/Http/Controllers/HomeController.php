<?php

namespace App\Http\Controllers;

use App\Mail\ContactUs;
use App\Models\Message;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use TCG\Voyager\Models\Post;
use App\Models\ProductSubcategory;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::latest()->take(3)->get();
        $man_item = Product::where('category_id', 1)->orderBy('created_at', 'desc')->take(8)->get();
        $woman_item = Product::where('category_id', 2)->orderBy('created_at', 'desc')->take(8)->get();
        $kids_item = Product::where('category_id', 3)->orderBy('created_at', 'desc')->take(8)->get();
        $accessory_item = Product::where('category_id', 4)->orderBy('created_at', 'desc')->take(8)->get();
        $perfume_item = Product::where('category_id', 5)->orderBy('created_at', 'desc')->take(8)->get();
        $products = collect(['man' => $man_item, 'woman' => $woman_item, 'kids' => $kids_item, 'accessories' => $accessory_item, 'perfume' => $perfume_item]);
        return view('home', ['products' => $products, 'posts' => $posts]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function send(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required',
            'subject' => 'required',
            'message' => 'required|min:10',
            'phone' => 'required',
        ]);

        $message = Message::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'message' => $request->message
        ]);

        Mail::send(new ContactUs($message));

        return view('mail-sent');
    }

    public function search(Request $request)
    {
        $request->validate([
            'query' => 'required|min:3',
        ]);

        $query = $request->input('query');
        $products = Product::where('name', 'like', "%$query%")
            ->orWhere('description', 'like', "%$query%")
            ->paginate(9);

        $subcategories = ProductSubcategory::all();

        return view('search', ['products' => $products, 'query' => $query, 'categories' => $subcategories]);
    }
}
