<?php

namespace App;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //
     use HasSlug;
     /**
   * Get the options for generating the slug.
   */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
             ->generateSlugsFrom('title')
             ->saveSlugsTo('slug');
    }
}
