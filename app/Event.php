<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $guarded = [
        'img'
    ];

    public static function findByUserId($id)
    {
    	return self::query()->where('user_id','=',$id)->get();
    }
}
