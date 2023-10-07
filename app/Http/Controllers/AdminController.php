<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminStoreRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subscriber;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard',[
            'products' => Product::latest()->get()
        ]);
    }

    public function create(){
        return view('admin.create',[
            'categories' => Category::all()
        ]);
    }

    public function store(AdminStoreRequest $request){
        $cleanData = $request->validated();
        $cleanData['image'] = request('image')->store('/images');
        $newProduct = Product::create($cleanData);
        Subscriber::mailToUsers($newProduct);
        return redirect(route('admin.dashboard'));
    }

    public function delete(Product $product){
        $product->delete();
        return back();
    }

    public function edit(Product $product){
        $categories = Category::all();
        return view('admin.edit',compact('product','categories'));
    }

    public function update(Product $product,AdminStoreRequest $request){
        $cleanData = $request->validated();
        $cleanData['image'] = request('image')->store('/images');
        $product->update($cleanData);
        return redirect(route('admin.dashboard'));
    }
}
