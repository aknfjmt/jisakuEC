<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    public function like_exist($user_id, $item_id) {        
        return Like::where('user_id', $user_id)->where('item_id', $item_id)->exists();       
        }

        protected $fillable = ['item_id'];

        public $timestamps = false;
    
        public function items(){
            return $this->belongsTo('App\Item','item_id','id');
            }
}
