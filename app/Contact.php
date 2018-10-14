<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $guarded = [];


    public function getFullNameAttribute()
	{
	    return "{$this->firstname} {$this->lastname}";
	}
}
