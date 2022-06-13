<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    public function apartments(){
        return $this->belongsToMany('App\Models\Apartment');
    }
}
