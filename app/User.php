<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;


    protected $appends = ['url','count_posts','is_followed'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','birthday','role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];



    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getBirthdayAttribute($date)
    {
       return Carbon::parse($date)->format('m/d/Y');
    }

    public function getUrlAttribute()
    {
        return route('profile.show',$this->id);
    }

    public function getCountPostsAttribute()
    {
        return $this->posts()->count();
    }

    public function remove()
    {
        $this->delete();
    }

    public function edit($fields)
    {
        $this->fill($fields);

        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    function followers()
    {
        return $this->belongsToMany('App\User', 'followers', 'user_id', 'follower_id')->withTimestamps();
    }

    function follow(User $user) {
        $user->followers()->attach($this->id);
    }

    function unfollow(User $user) {
        $user->followers()->detach($this->id);
    }

    public function isFollowed()
    {

        return $this->followers()->where('follower_id', auth()->id())->count() > 0;
    }

    public function getIsFollowedAttribute()
    {
        return $this->isFollowed();
    }



}
