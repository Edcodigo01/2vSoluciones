<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function scopeDisabled($query,$value){
        return $query->where('disabled',$value);
    }

}
