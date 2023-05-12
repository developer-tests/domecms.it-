<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhysicalBasicTest extends Model
{
 
 public function event(){
    return $this->belongsTo(Event::class,'id','event_id');
  }

public function userinfo(){
   return $this->belongsTo(UserInfo::class,'id','phy_id');
}
public function user(){
    return $this->hasMany(Ticket::class,'user_id','id');
}
public function mainUser(){
    return $this->hasMany(User::class,'id','user_id');
}

}
