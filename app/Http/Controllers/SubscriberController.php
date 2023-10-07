<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SubscriberController extends Controller
{
    public function store(){
        if(auth()->user()->is_subscribe){
            $cleanData = request()->validate([
                'email' => ['required',Rule::exists('subscribers','email')]
            ],['email.exists'=> 'Your email is not exists.']);
           return Subscriber::isSubscribed($cleanData);
        }
        if(!auth()->user()->is_subscribe){
            $cleanData = request()->validate([
                'email' => ['required',Rule::unique('subscribers','email')]
            ]);
           return Subscriber::unSubscribed($cleanData);
        }
    }
}
