<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TwitterCloneModel extends Model
{
    use HasFactory;
    protected $table = "twitter_clone"; //define this line or else it will throw an error like no database found 'twitter_clone"
    protected $fillable = [
        'content',
        'likes'
    ]; //What columns are assignable
}
