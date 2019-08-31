<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title', 'body', 'user_id'
    ];

    protected $hidden = [
        'user_id', 'created_at', 'updated_at',
    ];

    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }
}
