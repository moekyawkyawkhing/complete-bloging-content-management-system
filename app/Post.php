<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
	use SoftDeletes;
    protected $fillable=[
    	'title',
    	'content',
    	'category_id',
    	'feature',
    	'slug',
        'user_id'
    ];

    protected $dates=['deleted_at'];

    // accessor 
    public function getFeatureAttribute($feature){ 

    	return $feature;
    }

    public function tags(){ // many to many relationship

        return $this->belongsToMany("App\Tag");

    }

    public function category(){

        return $this->belongsTo("App\Category");

    }

    public function user(){

        return $this->belongsTo("App\User");

    }
}
