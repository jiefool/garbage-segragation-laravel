<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contact;

class Sent extends Model
{
    public function contact(){
    	return $this->hasMany(Contact::class);
    }
}
