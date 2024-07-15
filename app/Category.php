<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function scopeDisabled($query,$value){
        return $query->where('disabled',$value);
    }

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

}
