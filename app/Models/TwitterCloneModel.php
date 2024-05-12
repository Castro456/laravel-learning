<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterCloneModel extends Model
{
    use HasFactory;

    /**
     * It is eager loading and it reduces the db hit, in a single it will get the relationship data's.
     * 
     * first parameter for users, for each and every time we need to show user name in the tweet. and specified only the columns that we need. 
     * 
     * second parameter for comments
     * 
     * Need to study how eager loading works in detail.
     * 
     *  */  
    protected $with = ['user:id,name,image', 'twitter_comments'];

    protected $table = "twitter_clone"; //define this line or else it will throw an error like no database found 'twitter_clone"

    protected $fillable = [
        'user_id',
        'content'
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
