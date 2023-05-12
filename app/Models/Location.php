<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
   public function provinces(){
    return $this->hasOne(Province::class,'id','province_id');
   }
  
}
