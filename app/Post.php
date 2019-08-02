<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Notifications\InvoicePaid;
use Notification;

class Post extends Model
{

    protected $fillable = ['title','body'];

    protected  $appends = ['created_date','url'];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }


    public function getUrlAttribute()
    {
        return route('posts.show',$this->id);
    }

    public function removeImage(){
        if($this->image !=null)
        {
            Storage::delete('uploads/',$this->image);
        }
    }

    public function uploadImage($image){

        if($image == null) { return; }


        $this->removeImage();

        $filename = Str::random(10).'.'.$image->extension();

        $image->storeAs('uploads',$filename);
        $this->image =$filename;
        $this->save();

    }
    public static function add($fields)
    {

        $post = new static;

        $post->fill($fields);
        $post->user_id = Auth::id();

        $post->save();
        $post->sendNotification($post);
        return $post;

    }
    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }
    public function getImage()
    {
        if($this->image == null)
        {
            return '/img/icon.png';
        }
        return '/uploads/'.$this->image;

    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->save();
    }
    public function remove(){

        $this->removeImage();
        $this->delete();
    }
    public function sendNotification()
    {
        $followers = Auth::user()->followers;

        $details = [
            'name' => Auth::user()->name,
            'post_name' =>$this->title,
            'url' =>$this->url
        ];
        foreach ($followers as $user) {
        Notification::send($user, new InvoicePaid($details));
        }
    }

}
