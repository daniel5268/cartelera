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
    public static function findById($id)
    {
    	return self::query()->where('id','=',$id)->first();
    }
    public static function deleteById($id)
    {
    	self::query()->where('id','=',$id)->first()->delete();	
    }
    public static function allToday()
    {
        $today = date('Y-m-d');
        return self::query()->where('date','=',$today)->get();
    }
    public static function allFuture()
    {
        $today = date('Y-m-d');
        return self::query()->where('date','>',$today)->get();
    }
    
}
