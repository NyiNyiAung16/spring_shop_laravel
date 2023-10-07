<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function scopeFilter($query,$requestValue){
        $query->when($requestValue['search'] ?? null, function($query) use($requestValue){
            $query->where('name','Like','%'.$requestValue['search'].'%' );
        });

        $query->when($requestValue['category'] ?? null, function($query) use($requestValue){
            $query->whereHas('category', function($query) use($requestValue) {
                $query->where('name', $requestValue['category']);
            });
        });
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function AddToCartUsers(){
        return $this->belongsToMany(User::class);
    }
}
