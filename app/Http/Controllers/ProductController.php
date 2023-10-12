<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\User;

class ProductController extends Controller
{     
    public function index() {
        if(request(['search','category'])){
            $products = Product::filter(request(['search','category']))->paginate(12);
        }else{
            $products = Product::paginate(12);
        }
        
        return view('welcome',[
            'products' => $products,
            'categories' => Category::all()
        ]);
    }

    public function detail(Product $product){
        return view('products.detail',[
            'product' => $product,
            'randomProducts' => Product::inRandomOrder()->take(4)->get(),
            'comments' => Comment::where('product_id',$product->id)->get()
        ]);
    }

    public function AddToCart(Product $product){
        if(!auth()->user()->AddToCartProducts->contains('id',$product->id)){
            $product->AddToCartUsers()->attach(auth()->id());
            return back();
        }else{
            return back();
        }      
    }

    public function category(Category $category){
        return view('products.category',[
            'products' => $category->products
        ]);
    }

    public function showProducts(User $user){
        
        return view('products.showATCProducts',[
            'cartProducts' => $user->AddToCartProducts,
            'totalPrice' =>auth()->user()->AddToCartProducts->map( function($c){return (int) $c->price;})->sum()
        ]);
    }

    public function removeCart(Product $product){
        $product->AddToCartUsers()->detach(auth()->id());
        return back();
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }
}
