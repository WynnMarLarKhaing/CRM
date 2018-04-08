<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Issue extends Model
{   
    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }

    public function product()
    {
    	return $this->belongsTo('App\Product');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
