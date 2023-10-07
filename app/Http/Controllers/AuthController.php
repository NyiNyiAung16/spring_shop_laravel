<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }
    public function login(){
        return view('auth.login');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }

    public function store(StoreRequest $request){
        $cleanData = $request->validated();
        $user = User::create($cleanData);
        auth()->login($user);
        return redirect('/')->with('success','Welcome to SpringShop');
    }

    public function loginStore(){
        $cleanData = request()->validate([
            'email' => ['required',Rule::exists('users','email')],
            'password'=>['required','min:5']
        ]);
        auth()->attempt($cleanData);
        return redirect('/')->with('success','Welcome Back to SpringShop');
    }

    public function updatePhoto($photoUrl){
        $u = User::find(auth()->id());
        $u->update(['image'=>'images/'.$photoUrl]);
        return back();
    }

    public function updateName(){
       $u = User::find(auth()->id());
       $name = request('name');
       $u->update(['name'=>$name]);
       return back();
    }
}
