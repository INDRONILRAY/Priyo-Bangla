<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class newspost extends Model
{
    protected $table='news-posts';
    protected $fillable = [
        'user_id', 'title', 'post','category','tags','thumbail','video_link','views',
    ];
}
