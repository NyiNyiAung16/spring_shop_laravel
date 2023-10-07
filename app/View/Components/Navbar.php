<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $boolean = false;
        $products = null;
        if(auth()->check()){
            if(User::find(auth()->id())->AddToCartProducts->isNotEmpty()){
                $boolean = true;
                $products = User::find(auth()->id())->AddToCartProducts;
            }
        }
        return view('components.navbar',[
            'boolean'=> $boolean,
            'products'=> $products
        ]);
    }
}
