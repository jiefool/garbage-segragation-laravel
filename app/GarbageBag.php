<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GarbageBag extends Model
{
    public function stringDate(){
        $this->collect_date->toDayDateTimeString(); 
    }
}
