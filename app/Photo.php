<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    //
    public static $placeholder = "placeholder.jpg";
    public static $uploads = '/images/';

    protected $fillable = [
        'file'
    ];

    public function getFileAttribute($file){
        return self::$uploads . $file;
    }

    public static function getPlaceholder(){
        return self::$uploads . self::$placeholder;
    }
}
