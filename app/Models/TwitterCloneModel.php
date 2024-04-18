<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterCloneModel extends Model
{
    use HasFactory;
    protected $table = "twitter_clone"; //define this line or else it will throw an error like no database found 'twitter_clone"

    protected $fillable = [
        'user_id',
        'content',
        'likes'
    ]; //What columns are assignable

    public function twitter_comments() //name of the function should be the name of the table that has the relationship with [Wrong statement, fn name can be anything].
    {
        return $this->hasMany(TwitterCommentsModel::class, 'tweet_id', 'id'); // class, foreign key, primary key
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
