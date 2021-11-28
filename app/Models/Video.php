<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Video extends Model

{
    protected $guarded = [];
    protected $table = 'user_videos';
   public function business()
    {
        return $this->belongsTo('App\Models\User', 'users_id', 'id');
    }
}


?>