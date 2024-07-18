<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['count','mount','item_id'];



    public function items(){
    return $this->belongsTo('App\Item','item_id','id');
    }

    public function users(){
        return $this->belongsTo('App\User','user_id','id');
        }

    
}

