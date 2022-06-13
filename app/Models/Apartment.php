<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    public function user(){
        return $this->belongsTo('App\User');

    }
    public function messages(){
        return $this->hasMany('App\Models\Message');
    }
    public function images(){
        return $this->hasMany('App\Models\Image');
    }
    public function sponsorships(){
        return $this->belongsToMany('App\Models\Sponsorship');
    }
    public function services(){
        return $this->belongsToMany('App\Models\Service');
    }

}
