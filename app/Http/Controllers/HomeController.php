<?php

namespace App\Http\Controllers;

use App\models\Category;
use App\models\Product;
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
     * Show products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        return view('home')->with([
            "products" => Product::latest()->paginate(10),
            "categories" => Category::has("products")->get(),
            
        ]);
    }

    /**
     * Show products by category.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductByCategory(Category $category)
    {
        $products = $category->products()->paginate(10);
        $productsPagination = Product::paginate(12);
        return view('All_products',)->with([
            "products" => $products,
            "categories" => Category::has("products")->get(),
            "productCount"=> Product::count(),
           
        ]);
    }
}
