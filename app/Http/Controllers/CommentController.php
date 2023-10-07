<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Product $product){
        $cleanData = request()->validate([
            'body' => 'required'
        ]);
        $cleanData['user_id'] = auth()->id();
        $cleanData['product_id'] = $product->id;
        Comment::create($cleanData);
        return back();
    }

    public function delete(Comment $comment){
        $comment->delete();
        return back();
    }

    public function update(Comment $comment){
       $newBody = request('body');
       if(!$newBody){
        return back();
       }
       $comment->update(['body'=>$newBody]);
       return back();
    }
}
