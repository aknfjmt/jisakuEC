<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['image','name','text','amount'];

    public $timestamps = false;

    public function likes(){
        return $this->hasMany('App\Like','item_id');
        }

        public function orders(){
            return $this->belongsTo('App\Order','item_id');
            }

            public function users(){
                return $this->hasMany('App\User','user_id','id');
                }

        

        
}


