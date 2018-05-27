<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function hello()
    {
    	return $this->belongsToMany('App\Hello', 'categories_hellos');
    }
}
