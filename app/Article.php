<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'autor',
        'content',
        'disabled',
        'category_id',
    ];


    public function scopePublished($query,$value){
        return $query->where('disabled',$value);
    }

        public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function scopeCategories($query,$var){
        if($var)
            return $query->where('category_id',$var);
    }

    public function scopeTag($query,$var){
        if($var)
            return $query->join('tagsarticles', 'articles.id', '=', 'tagsarticles.article_id')
            ->select('articles.*')
            ->where("tagsarticles.tag_id",$var);

    }
///
    // $users = DB::table('users')
    //         ->join('contacts', 'users.id', '=', 'contacts.user_id')
    //         ->join('orders', 'users.id', '=', 'orders.user_id')
    //         ->select('users.*', 'contacts.phone', 'orders.price')
    //         ->get();
//
    public function scopeSearch($query,$value){
        if($value)
            return $query->where('title','LIKE','%'.$value.'%');
    }
}
