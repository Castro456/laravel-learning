<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'bio',
        'image'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function tweets()
    {
        //latest() - function will work same as order by 'DESC'
        return $this->hasMany(TwitterCloneModel::class, 'user_id', 'id')->latest();
    }

    public function comments()
    {
        return $this->hasMany(TwitterCloneModel::class, 'user_id', 'id')->latest();
    }

    public function following() //People who we are following
    {
        return $this->belongsToMany(User::class, 'follower_user', 'follower_id', 'user_id')->withTimestamps(); //Many to many
    }

    public function followers() //People who are following us
    {
        return $this->belongsToMany(User::class, 'follower_user', 'user_id', 'follower_id')->withTimestamps(); //Many to many
    }

    public function follows(User $user) //Check if we are following this user
    {
        return $this->following()->where('user_id', $user->id)->exists();
    }

    public function getImageURL()
    {
        // If the image is empty for the user in db, then just pass the link
        if($this->image) {
            return url('storage/'. $this->image); //Need to use the storage/ prefix in-order access the stored file.
        }
        else {
            return "https://api.dicebear.com/6.x/fun-emoji/svg?seed={$this->name}";
        }
    }
}
