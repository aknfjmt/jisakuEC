<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['title','text','item_id'];

    public function Item(){
    return $this->belongsTo('App\Item','item_id','id');
    }
}
