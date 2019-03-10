<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarbageType extends Model
{
    public function garbageBags(){
        return $this->hasMany('App\GarbageBag');
    }
}
