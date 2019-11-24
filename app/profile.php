<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable=[
    	'avatar',
    	'about',
    	'user_id',
    	'facebook',
    	'youtube'
    ];
}
