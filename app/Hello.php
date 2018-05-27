<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hello extends Model
{
    public function nice_action_logs()
    {
    	return $this->hasMany('App\NiceActionLog');
    }

    public function categories()
    {
    	return $this->belongsToMany('App\Category', 'categories_hellos');
    }
}
