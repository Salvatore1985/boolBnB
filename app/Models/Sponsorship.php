<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{

    protected $fillable = [
        'name',
        'period',
        'price'
    ];
    public function apartments(){
        return $this->belongsToMany('App\Models\Apartment');
    }
}
