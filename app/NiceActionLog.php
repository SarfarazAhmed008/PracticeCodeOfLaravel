<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NiceActionLog extends Model
{
   	public function hello()
   	{
   		return $this->belongsTo('App\Hello');
   	}
}
