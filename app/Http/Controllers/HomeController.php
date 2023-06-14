<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        return view('home')->with([
            'products' => Product::latest()->paginate(5),
            'categories' => Category::has('products')->get()
        ]);
    }

     /**
     * Show The Products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductByCategory(Category $category)
    {
        $products = $category->products()->paginate(5);
        return view('home')->with([
            'products' => $products,
            'categories' => Category::has('products')->get()
        ]);
    }
}
