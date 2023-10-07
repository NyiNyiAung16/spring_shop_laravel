<?php

namespace App\Models;

use App\Mail\Subscriber as MailSubscriber;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class Subscriber extends Model
{
    use HasFactory;

    public static function isSubscribed($email){
        User::find(auth()->id())->update(['is_subscribe' => false]);
        Subscriber::where('email',$email)->delete();
        return back()->with('success','UnSubscribe is successful!');
    }

    public static function unSubscribed($cleanData){
        User::find(auth()->id())->update(['is_subscribe' => true]);
        Subscriber::create($cleanData);
        return back()->with('success','Subscribe is successful🤩🤩!');
    }

    public static function mailToUsers($p){
        Subscriber::all()->each( function($u) use($p) {
            Mail::to($u->email)->queue(new MailSubscriber($p));
        });
    }
}
