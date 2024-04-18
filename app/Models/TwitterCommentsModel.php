<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterCommentsModel extends Model
{
    use HasFactory;
    protected $table = "twitter_comments"; //define this line or else it will throw an error like no database found 'twitter_clone"

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
