<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    public function apartment(){
        return $this->belongsTo('App\Models\Apartment');
    }
    protected $fillable=[
        'apartment_id',
        // 'name',
        'email',
        'email_content',
    ];
}
