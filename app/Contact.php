<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Area;

class Contact extends Model
{
    protected $guarded = [];


    public function getFullNameAttribute()
	{
	    return "{$this->firstname} {$this->lastname}";
	}

	public function area(){
		return $this->belongsTo(Area::class);
	}
}
